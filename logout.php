<?php
session_start();
unset($_SESSION['voter_name']);
unset($_SESSION['voter_id']);
unset($_SESSION['pin_code']);
header("Location:./index.php");
?>