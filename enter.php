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
    if ($dateToCheckTS >= $startDateTS && $dateToCheckTS < $endDateTS) {
  
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
<?php
if(isDateInRange($start,$res)){
    echo "<script>alert('RESULT IS NOT OUT YET.')
    window.location.replace('index.php');
    </script>";
}

?>
<!DOCTYPE html>
<html lang='en'>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in Online Voting System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti:wght@500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cardo:wght@700&display=swap" rel="stylesheet">

 <center>
    <style> 
    body {
        background-image: url('f.jpg');
        background-repeat: no-repeat;
        background-position: cover;
        background-size: 100%;
       

		/*background-color: rgba(241, 173, 227, 0.288);*/
            margin: 5%;
            justify-content: center;
            overflow: hidden;
            
            font-size: 5;
        /* background-size: 100%; */
        }
        input[type=submit] {
            background-color: none;
            padding: 15px 15px;
            border: 10px solid rgb(42, 157, 165);
            border-radius: 40px;
            color: rgb(0, 13, 20);
            margin: 2px 2px;
            cursor: pointer;
           /* box-sizing: border-box;*/
            font-size: 20px;
            font-family: 'Cardo', serif;
        }
 
          .enter{
            font-family: 'Cardo', serif;
            font-size: 30px;
            color: rgb(219, 218, 221);
            padding: 100px 10px;
          }
          #pin{
            border: 5px solid rgb(255, 255, 255);
            border-radius: 20px;
            width: 30%;
            height: 20%;
            padding: 20px 20px;
            background-color: rgb(194, 252, 244);
          }
          
        
        </style>
        </head>
<body>
  
    <div class="enter">
    <p><B>ENTER THE PIN-CODE BELOW TO DISPLAY THE RESULTS</B></p>
    <BR>
<form method="post" action="new_resultpage.php">

<input type="pin" id="pin" placeholder="Pincode" name="pin"><br><br>
<input type="submit"  value="Submit">
</form>
</div>
</body>
</html>