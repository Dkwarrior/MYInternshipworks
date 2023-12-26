<?php
ob_start();
function err_hand($eno, $emsg){    
}
set_error_handler("err_hand", E_NOTICE);
session_start();
date_default_timezone_set("asia/kolkata");
$today=date("Y-m-d");
?>
<?php require_once 'include/const.php';?>
<?php require_once 'include/db.php';?>
<?php require_once 'include/my_mail.php';?>
<?php require_once 'include/myfun.php';?>

<link rel="stylesheet" href="bs/css/bootstrap.min.css">
  <script src="jquery-3.1.0.min.js"></script>
  <script src="bs/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
<div class="container">
    <div class="row" style="background-color: #2f4fff;" >
        <div class="col-sm-2">
       
        <h1  style="color: white; font-weight: bold;">Classified Forum</h1>    
    </div>
        <div class="col-sm-10">
        <?php include 'cust_carousel.php'; ?>  
    </div>
</div>
<div class="row">
      <div class="col-sm-12">
  <nav class="navbar navbar-inverse" style="margin-bottom: 0px; border-radius: 0px;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nb">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="nb">
      <ul class="nav navbar-nav">
    
        <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php">Category <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="index.php?cate=Books">Books</a></li>
                <li><a href="index.php?cate=Vehicle">Vehicle</a></li>
                <li><a href="index.php?cate=Mobile">Mobile</a></li>
                <li><a href="index.php?cate=Laptop">Laptop</a></li>
                <li><a href="index.php?cate=Other">Other</a></li>
            </ul>
          </li>        
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li> 
        <li><a href="gallery.php">Gallery</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
      if(is_login()){
        echo "<li text-align: center><a>$_SESSION[uname]</a></li>";        

      ?>
        <li><a href="chpass.php"> Change Password</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      <?php 
      }
      else {
      ?>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href="reg.php"><span class="glyphicon glyphicon-user"></span> Register Now</a></li>
      <?php 
      }
      ?>      
      </ul>
    </div>
</nav>
      </div>
      </div>
