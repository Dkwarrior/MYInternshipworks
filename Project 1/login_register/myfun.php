<?php
function check_pass($pass){
    $err= null;
    if(strlen($pass)<=4){
        $err= "Password must be 5 char long!";
    }
    else if(preg_match("/\d{1}/", $pass)==false){
        $err= "Password must contain one digit!";
    }
    else if(preg_match("/[a-z, A-Z]{1}/", $pass)==false){
        $err= "Password must contain one alphabet!";
    }
    return $err;
}
?>