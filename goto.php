<?php
session_start();
$pin=$_POST['pin'];
//echo $pin;
$_SESSION['pin_code']=$pin;
//echo $_SESSION['pincode'];
header('location: new_resultpage.php');

?>