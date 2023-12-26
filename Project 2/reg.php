<?php $page="register" ?>
<?php require_once 'header.php';?>
<?php
$err="";
if(isset($_POST["uname"])){
    if(empty ($_POST["uname"])){
        $err = "Username is req!!";
    }
    else if(empty ($_POST["email"])){
        $err = "E-Mail is req!!";
    }
    else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)==false){
        $err = "E-Mail is incorrect!!";
    }
    else if(is_exist ($_POST["email"])){
        $err = "E-Mail is already registered!!";
    }
    else if(empty ($_POST["pass"])){
        $err = "Password is req!!";
    }
    else if(check_pass($_POST["pass"])!=""){
        $err = check_pass($_POST["pass"]);
    }
    else if($_POST["pass"]!=$_POST["cpass"]){
        $err = "does not match!!";
    }
    else if(preg_match("/^0?[6-9]{1}\d{9}$/", $_POST["pn"])==false){
        $err = "pn is incorrect";
    }
    else if(empty ($_POST["sec_q"])){
        $err = "Security Question is req!!";
    }
    else if(empty ($_POST["sec_a"])){
        $err = "Security Answer is req!!";
    }
    else {
        $query = "INSERT INTO `app_users` 
    (`user_name`, `email`, `pass`, `phone_no`, 
    `sec_q`, `sec_a`, `role`, `status`) 
    VALUES ('$_POST[uname]', '$_POST[email]', '$_POST[pass]', '$_POST[pn]', 
    '$_POST[sec_q]', '$_POST[sec_a]', 'user', 'approved');";
     $r =run_sql($query);
     redirect("login.php?msg=1");
    }
}
?>
<div class="row">    
    <div class="col-sm-10 col-sm-offset-1">    
        <h1>Register</h1>
<form method="post" class="form-horizontal">
  <div class="form-group  has-feedback">
      <input required type="text" class="form-control" id="uname"  name='uname' placeholder="User Name"  value="<?php echo $_POST["uname"]?>"/>
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>
  <div class="form-group">
      <input required type="email" class="form-control" id="email" name='email' placeholder="Email" value="<?php echo $_POST["email"]?>"/>
  </div>
  <div class="form-group  has-feedback">
      <input required type="password" class="form-control" id="pass"  name='pass' placeholder="Password"  />
      <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
  </div>
  <div class="form-group  has-feedback">
      <input required type="password" class="form-control" id="cpass"  name='cpass' placeholder="Confirm Password" />
      <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
  </div>
  <div class="form-group  has-feedback">
      <input required type="text" class="form-control" id="pn"  name='pn' placeholder="Phone No"  value="<?php echo $_POST["pn"]?>"/>
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
  </div>
  <div class="form-group">
      <input required type="text" class="form-control" id="sec_q" name='sec_q' placeholder="Security Question" value="<?php echo $_POST["sec_q"]?>"/>
  </div>
  <div class="form-group">
      <input required type="text" class="form-control" id="sec_a" name='sec_a' placeholder="Security Answer" value="<?php echo $_POST["sec_a"]?>"/>
  </div>    
    <div  class="form-group">
       <h4 style="color: red;"><?php echo $err;?></h4>
    </div>    
  <div class="form-group"> 
      <button type="submit" class="btn btn-primary" style="background-color: #660000">Register</button>
  </div>
  <div class="form-group"> 
      <a class="btn btn-primary" style="background-color: #660000" href="reg.php">Reset</a>
  </div>    
</form>
        </div>
</div>
<?php require_once 'footer.php';?>
