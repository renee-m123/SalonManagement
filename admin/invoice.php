<?php
	session_start();
	require_once "conn.php";
	$inv_id = isset($_GET['inv_id']) ? $con->real_escape_string($_GET['inv_id']) : null;
	$qSql = "SELECT * FROM tblpayments ";
	$qSql.= "LEFT JOIN signuptbl ON tblpayments.cus_id = signuptbl.ID ";
	$qSql.= "WHERE tblpayments.pmnt_id = '{$inv_id}' ORDER BY tblpayments.id DESC";
	$invInfo = $con->query($qSql)->fetch_assoc();
	//echo "<pre>"; print_r($invInfo); echo "</pre>"; exit;
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<style>
			* {
				border: 0;
				box-sizing: content-box;
				color: inherit;
				font-family: inherit;
				font-size: inherit;
				font-style: inherit;
				font-weight: inherit;
				line-height: inherit;
				list-style: none;
				margin: 0;
				padding: 0;
				text-decoration: none;
				vertical-align: top
			}

			span[contenteditable] {
				display: inline-block
			}

			h1 {
				font: bold 100% sans-serif;
				letter-spacing: .5em;
				text-align: center;
				text-transform: uppercase
			}

			table {
				font-size: 75%;
				table-layout: fixed;
				width: 100%;
				border-collapse: separate;
				border-spacing: 2px
			}

			th,
			td {
				border-width: 1px;
				padding: .5em;
				position: relative;
				text-align: left;
				border-radius: .25em;
				border-style: solid
			}

			th {
				background: #EEE;
				border-color: #BBB
			}

			td {
				border-color: #DDD
			}

			html {
				font: 16px/1 'Open Sans', sans-serif;
				overflow: auto;
				padding: .5in;
				background: #999;
				cursor: default
			}

			body {
				box-sizing: border-box;
				height: 11in;
				margin: 0 auto;
				overflow: hidden;
				padding: .5in;
				width: 8.5in;
				background: #FFF;
				border-radius: 1px;
				box-shadow: 0 0 1in -.25in rgba(0, 0, 0, 0.5)
			}

			header {
				margin: 0 0 3em
			}

			header:after {
				clear: both;
				content: "";
				display: table
			}

			header h1 {
				background: #000;
				border-radius: .25em;
				color: #FFF;
				margin: 0 0 1em;
				padding: .5em 0
			}

			header address {
				float: left;
				font-size: 75%;
				font-style: normal;
				line-height: 1.25;
				margin: 0 1em 1em 0
			}

			header address p {
				margin: 0 0 .25em
			}

			header span,
			header img {
				display: block;
				float: right
			}

			header span {
				margin: 0 0 1em 1em;
				max-height: 25%;
				max-width: 60%;
				position: relative
			}

			header img {
				max-height: 100px;
				max-width: 100%
			}

			header input {
				cursor: pointer;
				-ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
				height: 100%;
				left: 0;
				opacity: 0;
				position: absolute;
				top: 0;
				width: 100%
			}

			article,
			article address,
			table.meta,
			table.inventory {
				margin: 0 0 3em
			}

			article:after {
				clear: both;
				content: "";
				display: table
			}

			article h1 {
				clip: rect(0 0 0 0);
				position: absolute
			}

			article address {
				float: left;
				font-size: 125%;
				font-weight: 700
			}

			table.meta,
			table.balance {
				float: right;
				width: 36%
			}

			table.meta:after,
			table.balance:after {
				clear: both;
				content: "";
				display: table
			}

			table.meta th {
				width: 40%
			}

			table.meta td {
				width: 60%
			}

			table.inventory {
				clear: both;
				width: 100%
			}

			table.inventory th {
				font-weight: 700;
				text-align: center
			}

			table.inventory td:nth-child(1) {
				width: 26%
			}

			table.inventory td:nth-child(2) {
				width: 38%
			}

			table.inventory td:nth-child(3) {
				text-align: right;
				width: 12%
			}

			table.inventory td:nth-child(4) {
				text-align: right;
				width: 12%
			}

			table.inventory td:nth-child(5) {
				text-align: right;
				width: 12%
			}

			table.balance th,
			table.balance td {
				width: 50%
			}

			table.balance td {
				text-align: right
			}

			aside h1 {
				border: none;
				border-width: 0 0 1px;
				margin: 0 0 1em;
				border-color: #999;
				border-bottom-style: solid
			}

			.add,
			.cut {
				border-width: 1px;
				display: block;
				font-size: .8rem;
				padding: .25em .5em;
				float: left;
				text-align: center;
				width: .6em;
				background: #9AF;
				box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
				background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
				background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
				border-radius: .5em;
				border-color: #0076A3;
				color: #FFF;
				cursor: pointer;
				font-weight: 700;
				text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333)
			}

			.add {
				margin: -2.5em 0 0
			}

			.add:hover {
				background: #00ADEE
			}

			.cut {
				opacity: 0;
				position: absolute;
				top: 0;
				left: -1.5em;
				-webkit-transition: opacity 100ms ease-in
			}

			tr:hover .cut {
				opacity: 1
			}

			.paid {
				text-align: center;
				position: absolute;
				top: 50%;
				width: 100%;
				font-size: 95px;
				text-transform: uppercase;
				opacity: .15;
				transform: rotate(-40deg);
			}

			@media print {
				* {
					-webkit-print-color-adjust: exact
				}
				html {
					background: none;
					padding: 0
				}
				body {
					box-shadow: none;
					margin: 0
				}
				span:empty {
					display: none
				}
				.add,
				.cut {
					display: none
				}
			}

			@page {
				margin: 0
			}
		</style>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address>
				<p>Laney Beauty Parlor</p>
				<p>Great Wide Mall, Ongata Rongai</p>
				<p>0705228475</p>
			</address>
			<span><img alt="" src="../img/salon_logo.png"></span>
		</header>
		<article style="position:relative">
			<h1>Recipient</h1>
			<h4 style="margin-bottom: 1em">Invoice To</h4>
			<address>
				<p><?= $invInfo['fullName'] ?><br><?= $invInfo['phoneNo'] ?></p>
			</address>
			<table class="meta">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span><?= $inv_id ?></span></td>
				</tr>
				<tr>
					<th><span>Payment Date</span></th>
					<td><span><?= date("j F, Y (H:i)", strtotime($invInfo['date_of_pmnt'])) ?></span></td>
				</tr>
				<tr>
					<th><span>Invoice Date</span></th>
					<td><?= date("j F, Y (H:i)") ?></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th width="70%"><span>Item</span></th>
						<th><span>Rate</span></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$total = 0;
					$serviceIds = explode(",", $invInfo['services']);
						foreach ($serviceIds as $servId) {
						$sInfo = $con->query("SELECT * FROM tblservices WHERE ID = '{$servId}'")->fetch_assoc();
						
						if ($sInfo) {
							// If $sInfo is not null, proceed with adding to the total and displaying the info
							$total += $sInfo['Cost'];
							?>
					<tr>
						<td><?= htmlspecialchars($sInfo['ServiceName']) ?></span></td>
						<td><span>ksh</span><span><?= htmlspecialchars($sInfo['Cost']) ?></span></td>
					</tr>
				<?php }else {
					 echo "<tr><td colspan='2'>Service not found for ID: " . htmlspecialchars($servId) . "</td></tr>";
				} 
			}?>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span>Total</span></th>
					<td><span>KSH</span><span><?= $total ?></span></td>
				</tr>
				<tr>
					<th><span>Amount Paid</span></th>
					<td><span>KSH</span><span><?= $invInfo['paid_amount'] ?></span></td>
				</tr>
				<tr>
					<th><span>Balance Due</span></th>
					<td><span>	KSH</span><span><?= $total-$invInfo['paid_amount'] ?></span></td>
				</tr>
			</table>
		<?php if($total-$invInfo['paid_amount'] == 0) { ?>
			<p class="paid">paid</p>
		<?php } ?>
		</article>
		<aside>
			<h1><span>Thank You</span></h1>
		</aside>
	</body>
</html>