<?php
require_once 'include/const.php';

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or exit(mysqli_error($con));
echo "db connected<br>";

$query = "drop schema if exists $dbname";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "db dropped<br>";

$query = "create schema $dbname";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "db created<br>";

mysqli_select_db($con, $dbname);

$query = "CREATE  TABLE `app_users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_name` VARCHAR(45) NULL ,
  `email` VARCHAR(100) NULL ,
  `pass` VARCHAR(45) NULL ,
  `phone_no` VARCHAR(45) NULL ,
  `sec_q` VARCHAR(200) NULL ,
  `sec_a` VARCHAR(100) NULL ,
  `role` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) );";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "table created<br>";

$query = "INSERT INTO `app_users` 
    (`user_name`, `email`, `pass`, `phone_no`, 
    `sec_q`, `sec_a`, `role`, `status`) 
    VALUES ('admin', 'admin', 'admin', 'admin', 
    'admin', 'admin', 'admin', 'approved');";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "user inserted<br>";

$query = "CREATE  TABLE `adv` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `p_name` VARCHAR(45) NULL ,
  `p_desc` text NULL ,
  `cr_date` DATETIME NULL ,
  `price` DOUBLE NULL ,
  `city` VARCHAR(45) NULL ,
  `phone_no` VARCHAR(45) NULL ,
  `p_category` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) );
";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "table created<br>";

$query = "CREATE  TABLE `cate` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cate_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) );

";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "table created<br>";

$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Books')") or exit(mysqli_error($con));
$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Vehicle')") or exit(mysqli_error($con));
$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Electronics')") or exit(mysqli_error($con));
$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Mobile')") or exit(mysqli_error($con));
$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Laptop')") or exit(mysqli_error($con));
$r = mysqli_query($con, "INSERT INTO `cate` (`cate_name`) VALUES ('Other')") or exit(mysqli_error($con));

?>
