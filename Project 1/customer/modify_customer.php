<?php include("header/header.php"); ?>
<div class="back-img back-img1">
   <div class="container divform">
      <h2><span class=""></span> Modify Customer Details</h2>
      <?php
         $r = $_GET[ 'id' ];
         $s = mysqli_query( $con, "select * from customer_info where cust_id=$r" ); // this query for displaying info who is removing.
         while ( $row = mysqli_fetch_array( $s ) ) {
         	?>
      <!--this is info for customer  who is removing -->
      <form action="#" method="post" name="f1">
         <div class="form-group">
            <label for="text">customer Id:</label>
            <input type="text" class="form-control" id="pwd1" name="rol" placeholder="Enter password" readonly value="<?php echo $row[0];?>">
         </div>
         <div class="form-group">
            <label for="text">customer password:</label>
            <input type="text" class="form-control" id="pwd11" name="pass" placeholder="Enter password"  value="<?php echo $row[1];?>">
         </div>
         <div class="form-group">
            <label for="text">customer Email:</label>
            <input type="email" class="form-control" id="pwd111" name="email" placeholder="Enter password" value="<?php echo $row[2];?>">
         </div>
         <div class="form-group">
            <label for="text">customer FirstName:</label>
            <input type="text" class="form-control" id="pwd1" name="fname" placeholder="Enter password" value="<?php echo $row[3];?>">
         </div>
         <div class="form-group">
            <label for="text">customer LastName:</label>
            <input type="text" class="form-control" id="pwd1" name="lname" placeholder="Enter password"  value="<?php echo $row[4];?>">
         </div>
         <div class="form-group">
            <label for="text">customer Gender:</label>
            <input type="text" class="form-control" id="pwd1" name="gen" placeholder="Enter password"  value="<?php echo $row[5];?>">
         </div>
         <div class="form-group">
            <label for="text">customer Phone:</label>
            <input type="text" class="form-control" id="pwd1" name="phone" placeholder="Enter password"  value="<?php echo $row[6];?>">
         </div>
         <div class="form-group">
            <label for="text">customer Place:</label>
            <input type="text" class="form-control" id="pwd1" name="place" placeholder="Enter password"  value="<?php echo $row[7];?>">
         </div>
        
         <br/>
         <button type="submit" class="button special-red" name="sub">Update</button>
      </form>
      <?php } ?>
   </div>
</div>
<?php include( "../footer/footer.php" );?> 
<?php
   if ( isset( $_POST[ 'sub' ] ) ) {
   	$a = $_POST[ 'rol' ];
   	$b = $_POST[ 'pass' ];
   	$c = $_POST[ 'email' ];
   	$d = $_POST[ 'fname' ];
   	$e = $_POST[ 'lname' ];
   	$f = $_POST[ 'gen' ];
   	$g = $_POST[ 'phone' ];
   	$h = $_POST[ 'place' ];
   	
    $up="update customer_info set cust_id='$a', cust_pwd='$b', cust_email='$c',
     cust_Fname='$d', cust_Lname='$e',cust_sex='$f',cust_phone='$g',cust_address='$h' where cust_id='$r'"; // this is query for updating feedback.
	

   	$run = mysqli_query( $con, $up );
   	if ( $run ) {
   		echo "
   <script>
   alert('successfully');
    
       window.location.assign('index.php')
   
   
   </script>";
   	} else {
   		echo "not ok";
   	}
   }
   mysqli_close( $con );
   ?>