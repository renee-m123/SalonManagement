<?php
include("conn.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
    font-family: Georgia, 'Times New Roman', Times, serif;
    box-sizing: border-box;
}
body{
    background: #fefefe;
}
header{
   
    width: 100%;
    height: 150px;
    background: #1e2014;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 100px;
}
.logo {
    font-size: 28px;
    font-weight: bold;
    color:#c9f5c8;
}
.hamburger {
    display: none;
}
.navBar ul {
    display: flex;
}
.navBar ul li a {
    display: block;
    color: #fefefe;
    font-size: 20px;
    padding: 10px 10px;
    text-decoration: none;
    border-radius: 50px;
    transition: 0.2s;
    margin: 0 3px;
}
.navBar ul li a:hover {
    color: #315014;
    background: #9afd97;
}
.navBar ul li a.active{
    color: #315014 ;
    background: #9afd97;
}
.profile{

}
@media only screen and (max-width: 1320px){
    header{
        padding: 0 50px;
    }
}
@media only screen and (max-width: 1100px){
    header{
        padding: 0 30px;
    }
}
@media only screen and (max-width: 900px){
    .hamburger{
        display: block;
        cursor: pointer;
    }
    .hamburger .line{
        width: 30px;
        height: 3px;
        background:#fefefe;
        margin: 6px 0;
    }
    .navBar{
        height: 0 ;
        position: absolute;
        top: 100px;
        left: 0;
        right: 0;
        width: 100vw;
        background: #1e2014;
        transition: 0.5s;
        
    }
    .navBar .active {
        height: 450px;
    }
    .navBar ul{
        display: block;
        width: fit-content;
        margin: 80px auto 0 auto;
        text-align: center;
        transition: 0.5s;
        opacity:0;
    }
    .navBar ul li a{
        margin-bottom: 12px;
        
    }
    
}



    </style>
</head>
<body>
    <header>
        <div class="logo">Laney's..</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    <nav class="navBar">
        
        <ul>
            <li><a href="file.php" class="active">Home</a></li>
            <li><a href="about.php">About </a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact </a></li><br><br>
             <?php if (isset($_SESSION['bpmsaid'])){?>
             <li><a href="logout.php">Logout</a></li>
             <div><?=$_SESSION['bpmsaid']?></div>
             <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <?php }?>
    </nav>
    </header>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function(){
            navBar= document.querySelector(".navBar");
            navBar.classList.toggle("active");

        }
    </script>
</body>
</html>