<?php $page="adv_det" ?>
<?php require_once 'header.php';?>
<?php
check_login();
$whr = "";
if(!is_admin()){
    $whr = " and email = '$_SESSION[email]' ";
}
$query = "delete from adv where id = $_REQUEST[id] $whr ";
$r = run_sql($query);
if(mysqli_affected_rows()>0){
    unlink("upload/$_REQUEST[id].jpg");
}
redirect("index.php");
?>
<?php require_once 'footer.php';?>
