<?php require 'myfun.php'; ?>
<?php
$msg = "";

if (isset($_POST['first'])) {

	if (empty($_POST['first'])) {
		$msg = "Name is required !!!";
	} else if (empty($_POST['last'])) {
		$msg = "last Name is req";
	} else if (empty($_POST['mail'])) {
		$msg = "mail is requried!!!";
	} else if (empty($_POST['pass'])) {
		$msg = "Password is required !!!";
	} else if (check_pass($_POST['pass']) != '') {
		$msg = check_pass($_POST['pass']);
	} else if ($_POST['pass'] != $_POST['cpass']) {
		$msg = "Password does not match !!!";
	} else if (empty($_POST['gen'])) {
		$msg = "Gender is req!!!";
	} else if (preg_match("/^0?[6-9]{1}\d{9}$/", $_POST['num']) == false) {
		$msg = "Incorrect mobile Number!!";
	} else if (empty($_POST['add'])) {
		$msg = "address must be requried !!!";
	} else {
		$sql = "INSERT INTO customer_info (cust_pwd, cust_email, cust_Fname, cust_Lname, cust_sex, cust_phone, cust_address) VALUES ('$_POST[pass]','$_POST[mail]', '$_POST[first]','$_POST[last]','$_POST[gen]','$_POST[num]','$_POST[add]')"; //this is query for registration
		if (mysqli_query($con, $sql)) {
			$customerid = mysqli_insert_id($con);
			$sql1 = "select * from customer_info where cust_email='" . $_POST['mail'] . "' and cust_pwd='" . $_POST['pass'] . "'"; //This  is query for login.
			$result = mysqli_query($con, $sql1);
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				if ($row = mysqli_fetch_assoc($result)) {
					$_SESSION["uid"] = $row["cust_id"];
					$_SESSION["name"] = $row["cust_Fname"];
				}
				echo "<script>window.location.assign('customer/')</script>";
			}
		} else {
			echo "<script>alert('This Email Id has used. Please use other Email ID');
	window.location.assign('index.php?page=customer_register')</script>";
		}
	}
}

mysqli_close($con);
?>


<!--this is form for customer registration-->
<section id="One" class="wrapper style3" style="
    margin-top: -2%;
">
	<div class="inner">
		<header class="align-center">
			<p>Customer Registration</p>
			<h2>Customer Registration</h2>

		</header>
	</div>
</section>


<!-- Two -->
<section id="two" class="wrapper style2">
	<div class="inner">
		<div class="box">
			<div class="content">
				<div class="form-group">
					<h4 style="color: red;"><?php echo $msg; ?></h4>
				</div>


				<form action="" method="post" name="f1">
					<div class="form-group">
						<label for="first">First Name:</label>
						<input type="text" class="form-control" id="first" name="first" placeholder="Enter First Name" required>
					</div>
					<div class="form-group">
						<label for="last">Last Name:</label>
						<input type="text" class="form-control" id="last" name="last" placeholder="Enter Last Name" required>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="mail" placeholder="Enter email" required>
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" name="pass" placeholder="Password must be one alphabet & Digit & 5 char long" required>
					</div>
					<div class="form-group">
						<label for="pwd">Confirm Password:</label>
						<input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm password" required>
					</div>
					<div class="form-group">
						<label for="sel1">Gender:</label>
						<select class="form-control" id="sel1" name="gen" required>
							<option value="" hidden>------Select------</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="mob">Mobile Number:</label>
						<input type="text" class="form-control" id="mob" name="num" placeholder="Enter Mobile Number" required pattern="\d*" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10">
					</div>
					<div class="form-group">
						<label for="add">Complete Address:</label>
						<input type="text" class="form-control" id="address" name="add" placeholder="Enter Address" required>
					</div>


			</div>
			<b />
			<b />

			<button type="submit" class="button special" name="sub">Register</button>
			</form>
		</div>
	</div>
	</div>
</section>

<!--End this is form for customer registration-->