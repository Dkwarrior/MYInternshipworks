<?php
require_once 'const.php';
function run_sql($query){
    global $dbname, $con;
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysqli_error($con));
    mysqli_select_db($con, $dbname);
    $r = mysqli_query($con, $query) or exit(mysqli_error($con));
    return $r;
}
?>
