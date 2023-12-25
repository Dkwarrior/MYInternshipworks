<?php include("header/header.php"); ?>
<?php
   if($_SESSION["adminid"] == ""  ||  $_SESSION["adminid"]==NULL)
   {
   header('Location:../index.php?page=admin_login');
   }
   else{
   	$a=$_SESSION["adminid"];
   	?>
<!-- Banner -->
<section class="banner full">
   <article>
      <img src="../img/admin/kalinga.jpg" alt="" />
      <div class="inner">
         <header>
            <h2>
               ** Admin Panel ** 
            </h2>
            <p><?php echo "<div class='text-center wel-div'>Welcome "." " .$_SESSION["admin"]. "</div>"; ?> </p>
         </header>
      </div>
   </article>
</section>
<div class="row" align="center" style="margin-top:10px;;padding-left: 330px">
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
  
<?php
   }
   mysqli_close($con);
   ?>
<?php include("../footer/footer.php"); ?>