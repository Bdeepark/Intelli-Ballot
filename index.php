<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
?>

<?php
function isDateInRange($startDate, $endDate) {
    // Convert dates to timestamps
    $dateToCheck=date("Y-m-d");
    #echo $dateToCheck;
    #echo $endDate;
    $startDateTS = strtotime($startDate);
    $endDateTS = strtotime($endDate);
    $dateToCheckTS = strtotime($dateToCheck);
    /* echo $startDateTS."__";
    echo $endDateTS."__";
    echo $dateToCheckTS;
    echo $dateToCheckTS-$startDateTS; */
    // Check if date to check falls between start and end dates
    if ($dateToCheckTS >= $startDateTS && $dateToCheckTS <= $endDateTS) {
  
        return true;
    } else {

        return false;
    }
}
$date='SELECT * FROM votedates';
$result=$link->query($date);
$result=mysqli_fetch_assoc($result);
$start=$result['startdate'];
$end=$result['enddate'];
$res=$result['resultdate'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Online Voting Portal</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@600&display=swap" rel="stylesheet">
<style>  
* {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Crimson Text', serif;
        background-image: url("ovbg1.avif");
        background-position: cover;
        background-size: 100%;

    }

    .left {
        /* border: 2px solid red; */
        position: absolute;
        margin: 5px 5px;
        padding: 10px 10px;
        left: 2px;
        top: 2px;

    }

    .middle {
        font-size: 63px;
        position: absolute;
        border: 4px solid black;
        border-radius: 5px;
        margin: auto 250px 350px;
        width: 65%;
        padding: 10px;
        bottom: 5px;
        

    }
    .middle1 {
        font-family: 'Crimson Text', serif;
        font-size: 75px;
        position: absolute;
        border: 2px solid brown;
        border-radius: 5px;
        margin: auto 280px 250px;
        width: 60%;
        padding: 10px;
        bottom: 5px;
        

    }
    .middle2 {
        text-decoration: underline;
        font-family: 'Crimson Text', serif;
        font-size: 75px;
        position: absolute;
        /* border: 2px solid brown; */
        border-radius: 5px;
        margin: auto 350px 330px;
        width: 42%;
        padding: 10px;
        bottom: 5px;
        

    }

    .right {
        position: absolute;
        border: outset;
        border: 3px solid #553939;
        /* margin: 410px 530px; */
        margin: 550px 550px;
        width: 25%;
        padding: 2px 1px;
        right: -50px;
        margin-top: 400px;
    }
    .right1 {
        position: absolute;
        /* border: outset; */
        /* border: 3px solid #553939; */
        /* margin: 410px 530px; */
        margin: 410px 650px;
        width: 15%;
        padding: 10px 5px;
        right: -70px;
        margin-top: 500px;
    }

    .left img {
        /* width: 350px;
        height: 300px; */
        size: 50%;
        opacity: 0.5;
    }

    .btn {
        font-family:Georgia, 'Times New Roman', Times, serif;
        font-style: inherit;
        size: 100%;
        margin: 7px 7px;
        padding: 10px 10px;
        font-size: 20px;
        cursor: pointer;
        background-color: rgb(224, 221, 85);
        border-radius: 5%;
    }
    .btn1 {
        font-family:Georgia, 'Times New Roman', Times, serif;
        font-style: inherit;
        size: 80%;
        margin: 7px 7px;
        padding: 10px 10px;
        font-size: 20px;
        cursor: pointer;
        background-color: rgb(224, 221, 85);
        border-radius: 5%;
    }
    .btn1 a {
        color: brown;
        text-decoration: solid;
    }

    .btn a {
        color: brown;
        text-decoration: solid;
    }
    .btn:hover{
        /* margin-left: 5px;
        width: 0px;
        overflow: hidden;
        transition: 0.5s; */
        background: transparent;
        border: 2px solid rgb(158, 158, 233);
        color: rgb(158, 158, 233);
        margin-top: 5px;
    }
    .btn1:hover{
        /* margin-left: 5px;
        width: 0px;
        overflow: hidden;
        transition: 0.5s; */
        background: transparent;
        border: 2px solid rgb(158, 158, 233);
        color: rgb(158, 158, 233);
        margin-top: 5px;
    }
    


    
</style>
<?php

if(isDateInRange($start,$end)){
?>
<body>
    <div class="left">
        <img src="logo.png" alt="The Page is loading">
    </div>
    
    <div class="middle">
        <p> Welcome to Online Voting Portal</p>
    </div>
    <br>
    <div class="right">
        <button class="btn"> <a href="Login_page.html" target="blank">Log In </a></button>
        <button class="btn"> <a href="SignUp.html" target="blank">Sign Up </a></button>
        <button class="btn"> <a href="aboutus.html"> About Us</a></button>
        
    </div>

</body>
<?php
}
elseif($res<=date("Y-m-d")) {
?>
<body class="container2">
    <h1 class="middle2">Result is out.</h1>
    <div class="right1">
        <button class="btn1"> <a href="enter.php" target="blank">Check Result</a></button>
    <div>
</body>
<?php
}
else { ?>
<body>
    <h1 class="middle1">Result will declare soon. Check this page on the specified date again.</h1>
</body>
<?php } ?>




</html>