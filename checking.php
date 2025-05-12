<?php
session_start();
$vid=$_POST['vid'];
$pass=$_POST['pass'];
//$pin=$_POST['pin'];
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
	$flag=0;
	$check="select * from `voter`";
	$check1=$link->query($check);
	while($take=$check1->fetch_assoc()){
		if($take["VOTER_ID"]==$vid && $take["PASSWORD"]==$pass){
			$flag=1;
			break;
		}
	}
	$check="select * from `voter` where voter_id='$vid'";
	$check1=$link->query($check);
	$take=$check1->fetch_assoc();
	$_SESSION['fn']=$take["FIRSTNAME"];
	$_SESSION['voter_id']=$take["VOTER_ID"];
	$_SESSION['pin_code']=$take["PINCODE"];
	 if($flag==1){
		header("Location: 3.php");
	}
	else{
			$message = 'INVALID CREDENTIALS.';
		
			echo "<SCRIPT>
				alert('$message')
				window.location.replace('index.php');
			</SCRIPT>";
		}
	$link->close();
}
?>