<?php $page="chpass" ?>
<?php require_once 'header.php';?>
<?php
check_login();
$err="";
if(isset($_POST["opass"])){
    if(empty ($_POST["opass"])){
        $err = "Old Password is req!!";
    }
    else if(empty ($_POST["npass"])){
        $err = "New Password is req!!";
    }
    else if(check_pass($_POST["npass"])!=""){
        $err = check_pass($_POST["npass"]);
    }
    else if($_POST["npass"]!=$_POST["cpass"]){
        $err = "Does not match!!";
    }
    else {
        $query = "update `app_users` 
     set `pass` =  '$_POST[npass]'
     where `pass` =  '$_POST[opass]'
        and email = '$_SESSION[email]'";
     $r =run_sql($query);
     if(mysqli_affected_rows($con)>0){
        redirect("login.php?msg=2");         
     }
     else {
         $err = "Old password is incorrect!!";
     }
    }
}
?>
<div class="row">    
    <div class="col-sm-10 col-sm-offset-1">    
        <h1>Change Password</h1>
<form method="post" class="form-horizontal">
  <div class="form-group  has-feedback">
      <input required type="password" class="form-control" id="opass"  name='opass' placeholder="Old Password"  />
      <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
  </div>
  <div class="form-group  has-feedback">
      <input required type="password" class="form-control" id="npass"  name='npass' placeholder="New Password"  />
      <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
  </div>
  <div class="form-group  has-feedback">
      <input required type="password" class="form-control" id="cpass"  name='cpass' placeholder="Confirm Password"  />
      <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
  </div>
    <div  class="form-group">
       <h4 style="color: red;"><?php echo $err;?></h4>
    </div>    
  <div class="form-group"> 
      <button type="submit" class="btn btn-primary" style="background-color: #660000">Change Password</button>
  </div>
  <div class="form-group"> 
      <a class="btn btn-primary" style="background-color: #660000" href="chpass.php">Reset</a>
  </div>    
</form>
        </div>
</div>        
<?php require_once 'footer.php';?>
