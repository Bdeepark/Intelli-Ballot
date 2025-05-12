<?php
session_start();
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}

if($_SESSION['voter_id']=='')
{
    header("Location:Login_Page.html");
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

    <title>
        Rules and Details page
    </title>
 
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        body {
        background-image: url('3.jpg');
        background-position: cover;
        background-size: 100%;
        background-repeat: no-repeat;
       

		/*background-color: rgba(241, 173, 227, 0.288);*/
            margin: 2%;
            justify-content: center;
           /* overflow: hidden;*/
            
            font-size: 5;
        background-size: 100%;
        }

        .btn {
            
            cursor: pointer;
            outline:none;
            margin: 12px 5px;
            padding: 10px 22px;
            border: 2px solid black;
            border-radius: 30px;
            font-size: 20px;
            background: none;
            color: yellow;
            color: yellow;
            /* font-weight: bold; */
        }
        .button {
            
            cursor: pointer;
            outline:none;
            margin: 12px 5px;
            padding: 10px 22px;
            border: 2px solid black;
            border-radius: 30px;
            font-size: 20px;
            background: none;
            color: yellow;
            color: yellow;
            /* font-weight: bold; */
        }
        .btn:hover {
            cursor: pointer;
             background-color: lightblue; 
            color: purple;
            opacity: 0.9;
            font-weight: bold;     
            
        }
       
      
      .xyz button{
        
            cursor: pointer;
            outline:none;
            margin: 12px 5px;
            padding: 10px 22px;
            border: 2px solid black;
            border-radius: 30px;
            font-size: 20px;
            background: none;
            color: rgb(141, 225, 142);
            color: rgb(75, 26, 224);
            /* font-weight: bold; */
      }
      .button:hover{
            cursor: pointer;
             background-color:white; 
            color:black;
            opacity: 0.9;
            font-weight: bold; 
       

      }
      img {
        border: 5px solid #555;
        border-color: white;
        }
        .box-wrapper {
            height: 95vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
 
        #box1 {
            /*background-color: rgb(247, 166, 61);*/
            padding: 50px;
           
           

        }

 
        #box3 {
            padding: 7px;
            flex-grow: 1;
            display: flex;
            flex-direction: row;
            color: white;
           font-family: 'Kaisei Opti', serif;
           
        }
 
        #box4 {
           /* background-color: rgb(247, 246, 246);*/
            flex-grow: 1;

            border-style: dotted;
            border-color: white;
            background-color:rgba(0, 0, 0, 0.5);
        }
 
        .middle-column {
            flex-grow: 0.1;
            display: flex;
            flex-direction:column;
        }
 

 
        #box8 {
            /*background-color: rgb(73, 226, 93);*/
            flex-grow: 1;
            /*border: solid 1px white;*/
            padding-right: 10px;
            padding-left: 10px;
            margin-top: -40px;
        }
        .rules{
            font-family: 'Marcellus', serif;
            color: white;
            font-size: 30px;
        }
        .regulations{
            font-family: 'Baskervville', serif;
            color: white;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
</head>
 
<body>
   
    <div class="box-wrapper">
        <div id="box1">
             <B class="rules">RULES  REGARDING  ONLINE  VOTING</B><BR><BR>
            <p class="regulations">
                1) YOU CAN ENROLL AS A VOTER ONLY IF YOU ARE AN INDIAN CITIZEN AND A RESIDENT OF THE PART/POLLING AREA OF THE CONSTITUENCY.<BR><BR>
                2) YOU HAVE ATTAINED THE AGE OF 18 YEARS ON THE QUALIFYING DATE i.e. 1ST JANUARY OF THE YEAR OF REVISION OF ELECTORAL ROLL.<BR><br>
                3) A VOTER CAN CHECK THE DETAILS OF EVERY CANDIDATE BY CLICKING ON THEIR NAME BEFORE CASTING HIS/HER FINAL VOTE.<BR><BR>
                4) THE ANNOUNCEMENT OF THE SPECIFIED VOTES WILL BE ANNOUNCED ON A PARTICULAR DATE ONLY AFTER THE ENTIRE VOTING PROCESS IS COMPLETED.<BR><BR> 
    </B></p>
        </div>
 
 
        <div id="box3">
            <div id="box4">
                
<?php
$vi=$_SESSION['voter_id'];
$check="select * from `voter` where voter_id='$vi'";
$check1=$link->query($check);
$take=$check1->fetch_assoc();

echo "<script>alert('Voter ID: ".$take["VOTER_ID"]."    "."Full Name: ".$take["FIRSTNAME"]." ".$take["LASTNAME"]."')</script>";

$img=$take["PHOTO"];
echo "<br><img src='./voterpic/$img' height='100' width='100'>";
echo "<br><br>";
//echo "<table border=>";
		echo "<tr>";
		echo "<b>Voter ID :  ";
        echo "<td>".$take["VOTER_ID"];
        echo" <br><br>";
        
		echo "<td>First Name : ";
        echo "<td>".$take["FIRSTNAME"];
        if ($take["MIDDLENAME"]!='')
        {
            echo" <br><br>";
            echo "<td>Middle Name : ";
            echo "<td>".$take["MIDDLENAME"];
        }
        echo"<br><br>";
        echo "<td>Last Name : ";
        echo "<td>".$take["LASTNAME"];
        echo "<br><br>";
		echo "<td>DOB : ";
        echo "<td>".$take["DATE_OF_BIRTH"];
        echo "<br><br>";
        echo "<td>Pincode : ";
        echo "<td>".$take["PINCODE"];
        echo"<br><br>";
        echo "<td>State : ";
        echo "<td>".$take["STATE"];
		echo "</tr>";
		echo "<tr>";
		echo "<tr>";
	
?>
            </div>
            <div class="middle-column">
                <div id="box5">
                    
                </div>
                <div id="box6">
                    
                </div>
                <div id="box7">
                    
                </div>
            </div>
            <div id="box8">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="outer-box">
        <div class="inner-box">
            <header class="signup-header">
            </header>
            <main class="signup-body"><br><br><br><br><br><br><br>
            <div class="xyz">
                <?php
                $v=$_SESSION['voter_id'];
                $sql="select * from voter where voter_id='$v'";
                $row1=$link->query($sql);
                $DATAROW1=mysqli_fetch_assoc($row1);
                if($DATAROW1['VOTESTATUS']==0){
                    $pin=$_SESSION['pin_code'];
                    $sql="select * from `candidatepin` where pin='$pin'";
                    $pincheck=$link->query($sql);
    
                    if(mysqli_num_rows($pincheck)>0){
                        echo "VOTE IS GOING ON IN THIS AREA . PLEASE CLICK ON THE BUTTON BELOW TO VOTE.";
                        echo "<br><br>";
                        /*echo "<a href='./voting_page.php?ccode='''>CLICK HERE</a>";*/
                        echo"<b><a class='button' href='./voting_page.php?ccode='''>CLICK HERE</a>";
                        echo "<br><br><br>";
                        echo "IF YOU DON'T WANT TO VOTE THEN CLICK ON THE LOG-OUT BUTTON BELOW."; 
                    }
                    else{
                        /*ekhane ekta page e jabe*/
                        echo "NO ONGOING VOTE IN THE GIVEN PIN-CODE. PLEASE CLICK ON THE BUTTON BELOW TO LOG-OUT.";
                    }
                }
                else{
                    echo "<B><FONT SIZE=4>YOUR VOTE HAS ALREADY BEEN RECORDED.YOU CAN LOGOUT BY CLICKING ON THE BUTTON BELOW.</B></FONT>";
                }
                

                ?>
                </div>
               
            </main>
      </div>
    </div>
</body>
</html>
<br><br>
 

<a class="button" href="./logout.php" >LOG - OUT</a>
            </div>
        </div>
    </div>
</body>
 
</html>
<!-- PHP FILE FOR PINCODE CHECKING -->
<?php
    $pin=$_SESSION['pin_code'];
    $flag=0;
    $check="select * from `checkpin`";
    $check1=$link->query($check);
	while($take=$check1->fetch_assoc()){
        if($take["PINCODE"]==$pin){
			$flag=1;
            
		}
    }
?>
