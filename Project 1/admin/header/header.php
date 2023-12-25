<?php
include("../connection.php");
session_start(); // Start the session
$a=$_SESSION["adminid"];
?>
<!doctype html>
<html lang="en" class="gr__localhost" style="
    margin-top: 67px;
    background-color: BLACK;
">
<head>
<title>Admin - <?php echo $_SESSION["admin"]; ?> - Kalinga Art </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<link rel="stylesheet" href="../assets/css/main.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 
<!-- jQuery library -->
<script src="../boots/js/jquery.js"></script>
<link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
<link rel="icon" href="../img/logo.ico" type="image/x-icon">
<!-- Latest compiled JavaScript -->

<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

</head>


<header>
<nav class="#header">

  <!-- Header -->
			<header id="header" class="alt">
				<div class="logo">
				<img src="logo.png" width="93px" height="46px" style="position: absolute;left:0;top:0;" >
                <a href="index.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Kalinga Art</span></a></div>	
				<!--<a href="index.php"><span>Kalinga Art Portal</span></a></div>-->
				<a href="#menu"><p class="custom-para">Action</p></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="view_booking_detail.php">View Bookings Details </a></li>
					<li><a href="view_payment_detail.php">View Payments Details </a></li>
					<li><a href="add_product.php">Add Arts</a></li>
					<li><a href="manage_product.php">Manage Arts</a></li>
					<li><a href="manage_customer_detail.php">Manage Customers </a></li>
					<li><a href="manage_feedback.php">Manage Feedbacks</a></li>
					<li><a href="add_exhibitionevents.php">Add Exhibition &amp; Events</a></li>
					<li><a href="manage_exhibitionevents.php">Manage Exhibition &amp; Events</a></li>
					<li><a href="gallery.php">Gallery &amp; Photos</a></li>
					<li><a href="galleryadd.php">Manage Gallery &amp; Photos</a></li>

					<li><a class="a button special" href="admin_logout.php?id=<?php echo $a;?>">Log Out</a></li>
				</ul>
			</nav>
 
</nav>
</header>
<body>