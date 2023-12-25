<?php
include("connection.php");
session_start(); // Start the session
?>
<!DOCTYPE HTML>
<html>

<head>
   <title>Kalinga's Art </title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="assets/css/main.css" />
   
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <link rel="icon" href="img/bg/logo.ico" type="image/x-icon">

</head>

<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 

   <!-- Header -->
   <header id="header" class="alt">
      <div class="logo">
      <a href="index.php">
      <img src="logo.png" width="93px" height="46px" style="position: absolute;left:0;top:0;" >
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span>Kalinga's Art </span></a></div>
      <ul class="nav navbar-nav custom-navbar" style="flex-direction:row">
         <li ><a href="index.php">Home</a></li>
   <!--      <li ><a href="index.php?page=gallery">Gallery</a></li> -->
         <li ><a href="index.php?page=aboutus">About us</a></li>
      </ul>
      <a href="#menu">
         <p class="custom-para">Login</p>
      </a>
   </header>
   <!-- Nav -->
   <nav id="menu">
      <ul class="links">
         <li><a href="index.php?page=cust_reg">User Registration</a></li>
         <li><a href="index.php?page=customer_login">Customer</a></li>
         <li><a href="index.php?page=admin_login">Admin</a></li>


      </ul>
   </nav>
   <section>
      <?php
      if (isset($_GET['page'])) {

         $page_name = $_GET['page'];

         include("login_register/" . $page_name . ".php");
      } else {

         include("login_register/main.php");
      }

      ?>
   </section>
   <!-- team -->
   <div class="row" align="center" style="margin-top:10px;padding-left: 330px">
 
      <div class="col-lg-4" >
        <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>-->
        <img src="Dk.png" class="rounded-circle" alt="Cinque Terre" width="150" height="150"> 
        <h4 class="fw-normal" align="center">Student</h4>
        <h6>Mr. Deepak Dhruw</h6>
        <p>Information of Technology</p>
      </div>

      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="150" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
        <h4 class="fw-normal">Supervisior</h4>
        <h6>Mr. Pawan Kumar Jaiswal</h6>
        <p> Assistant Profcessor of CS & IT</p>
      </div>

    
    </div>
  

   <!-- Footer -->
   <footer id="footer">
      <div class="container">
         <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
         </ul>
      </div>
      <div class="copyright">
         <div class="footer text-center" style="font-size: 17px;">www.kalingartportal.com</div>
         &copy; copyright 2023.All rights reserved.
      </div>
   </footer>
   <!-- Scripts -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/jquery.scrollex.min.js"></script>
   <script src="assets/js/skel.min.js"></script>
   <script src="assets/js/util.js"></script>
   <script src="assets/js/main.js"></script>
</body>

</html>