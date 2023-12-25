<?php include("header/header.php");?>
<div class="back-img back-img1">
	<div class="container divform">
		<?php
		$r = $_GET[ 'id' ];
		$s = mysqli_query( $con, "select * from art_info where art_id=$r" ); // this is query for fetching detail of product who is updating.
		while ( $row = mysqli_fetch_array( $s ) ) {
			?>
		<h2>Update Product</h2>

		<form action="" method="post" name="f1" enctype="multipart/form-data">

			<div class="form-group">
				<label for="artnm">Art Name:</label>
				<input type="text" class="form-control" id="artnm" name="a1" required value="<?php echo $row[1];?>">
			</div>
			<div class="form-group">
				<label for="sell">Art Category:</label>
				<select class="form-control" id="sel1" name="a2" required>
            <option value="<?php echo $row[2];?>" selected><?php echo $row[2];?></option>
                        <option value="Art Deco">
                Art Deco            </option>
                        <option value="Fine Art">
                Fine Art            </option>
                        <option value="Folk">
                Folk            </option>
                        <option value="Pop Art">
                Pop Art            </option>
                        <option value="Street Art">
                Street Art            </option>
                    </select>
			
			</div>
			<div class="form-group">
				<label for="pr">Art Price(Rs.):</label>
				<input type="text" class="form-control" id="pr" name="a3" required value="<?php echo $row[3];?>">
			</div>
			<div class="form-group">
				<label for="dis">Art Discount(Rs.):</label>
				<input type="text" class="form-control" id="dis" name="a4" required value="<?php echo $row[4];?>">
			</div>
			<div class="form-group">
				<label for="ph">Art Photo:</label>
				<img src="<?php echo $row[5];?>" class='img-responsive dp'><br/>
				<input type="file" class="form-control" id="uploadedimage" name="uploadedimage" value="<?php echo $row[5];?>">
			</div>
			<div class="form-group">
				<label for="det">Art Detail:</label>
				<textarea class="form-control" id="det" name="a6" required>
					<?php echo $row[6];?>
				</textarea>
			</div><br/>
            
			<button type="submit"  class="button special-red" name="sub">Submit</button>
		</form>

		<?php } ?>

	</div>
</div> <?php include( "../footer/footer.php" );?> 
<?php
if ( isset( $_POST[ 'sub' ] ) ) {
					$a = $_POST[ 'a1' ];
					$b = $_POST[ 'a2' ];
					$c = $_POST[ 'a3' ];
					$d = $_POST[ 'a4' ];
	
		function GetImageExtension($imagetype)
			{
	  			if(empty($imagetype)) return false;
	  			switch($imagetype)
	  			{
		  			case 'image/bmp': return '.bmp';
		  			case 'image/gif': return '.gif';
		  			case 'image/jpeg': return '.jpg';
		  			case 'image/png': return '.png';
		  			default: return false;
	  			}
			}

		if (!empty($_FILES["uploadedimage"]["name"]))
				{
	   				$file_name=$_FILES["uploadedimage"]["name"];
	   				$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	   				$imgtype=$_FILES["uploadedimage"]["type"];
	   				$ext= GetImageExtension($imgtype);
	   				$imagename=date("d-m-Y")."-".time().$ext;
	   				$target_path = "../img/".$imagename;
	   				
	   if(move_uploaded_file($temp_name, $target_path)) {

	   echo "image success";	
}
  else

  {
	  echo "error";
  }

}
    $f = $_POST[ 'a6' ];
	$up = "update art_info set art_name='$a', art_category='$b', art_price='$c', art_discount='$d', art_photo='$target_path',art_detail='$f' where art_id='$r'"; // this query for updating product

	$run = mysqli_query( $con, $up );
	if ( $run ) {
		echo "
<script>

 	alert('Art Successfully Updated!');
  
     window.location.assign('manage_product.php')
 

</script>";
	} else {
		echo "Art not Updated...!!";
	}
}
mysqli_close( $con );
?>