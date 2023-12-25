<?php 
$conn = mysqli_connect("localhost", "root", "", "artwork");
function run_sql($query){
    global $dbname, $conn;
    $conn = mysqli_connect("localhost", "root", "", "artwork") or exit(mysqli_error($conn));
    mysqli_select_db($conn, $dbname);
    $r = mysqli_query($conn, $query) or exit(mysqli_error($conn));
    return $r;
}
?>