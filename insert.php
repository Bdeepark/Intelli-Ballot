<?php

$vid=$_POST['vid'];
$photo=$_POST['vfile'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$add=$_POST['add'];
$phone=$_POST['phno'];
$gen=$_POST['gen'];
$mail=$_POST['mail'];
$rel=$_POST['rel'];
$cat=$_POST['cat'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$pass=$_POST['pass'];
$conf=$_POST['conf'];
date_default_timezone_set('Asia/Kolkata');
$dateToCheck=date("Y-m-d");
$dobTS = strtotime($dob);
$dateToCheckTS = strtotime($dateToCheck);
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
	if( (((($dateToCheckTS - $dobTS)/365)/24)/3600) < 18){
		echo "<script>alert('Age must be above 18.')
            window.location.replace('Signup.html');
            </script>";
	}
	else{
		if($pass!=$conf){
			echo "<script>alert('The the passwords must be same.')
            window.location.replace('Signup.html');
            </script>";
		}
		else{
		$check="insert into `voter` values ('$photo','$vid','$fname','$mname','$lname','$dob','$add','$phone','$gen','$mail','$rel','$cat','$pin','$state','$pass','0')";
		$check1=$link->query($check);
		if($check1){
			#echo "<script>alert("Your data has been inserted")</script>";
			header("Location: Login_Page.html");
		}
		else{
			echo "Not Inserted!!!";
		}
	}
	}
	$link->close();
}
?>