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
            <main class="signup-body">
                <form action="checkstatus.php" method="POST">
                    <p>
                        <label for="vid">VOTE STATUS</label>
                        <input type="text" id="vid" name="vid" required>
                        <input type="submit" value="Enter">
                    </p>
                </form>
            </main>
      </div>
    </div>
</body>
</html>



<?php
    $vid=$_POST['vid'];
    $link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
    $flag=0;
    $check="select * from `voter` where VOTER_ID='$vid'";
    $check1=$link->query($check);
    $take=$check1->fetch_assoc();
        if($take["votestatus"]==0){
			$flag=1;
        }
    if($flag==1){
        
        echo "You can cast your vote!!";
    }
    else
    {
        echo "Vote is already done , please log out!!!";
    }
}
?>