<?php
session_start();
error_reporting(E_ALL); // Enable error reporting for debugging
ini_set('display_errors', 1); // Display errors

include('conn.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Payments</title>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/styleF.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php include_once('includes/sidebar.php'); ?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <?php include_once('includes/header.php'); ?>
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables">
                    <h3 class="title1">Payments</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <div class="text-right">
                            <a href="new-payments.php" class="btn btn-success"><i class="fa fa-plus"></i> New Payment</a>
                        </div>
                        <div style="height: 10px"></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Id</th>
                                    <th>Customer Info</th>
                                    <th>Services</th>
                                    <th>Method</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qSql = "SELECT * FROM tblpayments 
                                         LEFT JOIN signuptbl ON tblpayments.cus_id = signuptbl.id 
                                         ORDER BY tblpayments.id DESC";
                                $ret = mysqli_query($con, $qSql);
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                    $total_cost = 0;
                                    $ser_array = explode(",", $row['services']); 
                                ?>
                                    <tr>
                                        <th scope="row"><?= $cnt ?></th>
                                        <td><?= sprintf('%06d', $row['pmnt_id']) ?></td>
                                        <td>
                                            <p><?= htmlspecialchars($row['fullName'] ?? 'N/A'); ?></p>
                                            <p class="text-muted"><small><?= htmlspecialchars($row['phoneNo'] ?? 'N/A'); ?></small></p>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($ser_array as $ser_id) {
                                                $service_info = $con->query("SELECT ServiceName, Cost FROM tblservices WHERE id='{$ser_id}'")->fetch_array(MYSQLI_ASSOC);
                                                if ($service_info){
                                                    echo '<div style="margin-bottom: 5px">';
                                                    echo '    <p>' . htmlspecialchars($service_info['ServiceName']) . '</p>';
                                                    echo '    <p style="font-size:12px;color:#888">Cost: ' . htmlspecialchars($service_info['Cost']) . '</p>';
                                                    echo '</div>';
                                                    $total_cost += $service_info['Cost']; // Accumulate total cost
                                                } else {
                                                    echo '<div style="margin-bottom: 5px">';
                                                    echo '    <p style="color:red">Service not found or unavailable.</p>';
                                                    echo '</div>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?= htmlspecialchars($row['method'] ?? 'N/A'); ?></td>
                                        <td><?= date("j M, Y (H:i)", strtotime($row['date_of_pmnt'] ?? '')); ?></td>
                                        <td><?= htmlspecialchars($total_cost); ?></td>
                                        <td>
                                            <a class="btn btn-success" href="invoice.php?inv_id=<?= urlencode($row['pmnt_id']); ?>" target="_blank"><i class="fa fa-file"></i> Invoice</a>
                                            <p><a href="edit-payment.php?id=<?= urlencode($row['id']); ?>"><i class="fa fa-pencil"></i> Update</a></p>
                                        </td>
                                    </tr>
                                <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </div>
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;
        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
