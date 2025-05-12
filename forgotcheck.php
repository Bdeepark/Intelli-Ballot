<?php
    session_start();
    $vid=$_POST['vid'];
    $_SESSION['vid']=$vid;
    $mail=$_POST['mail'];
    $link=new mysqli('localhost','root','','onlinevote');
    if(!$link){
        die("Connection failed");
    }
    else{
       $flag=0;
        $check="select * from `voter`";
        $check1=$link->query($check);
        while($take=$check1->fetch_assoc()){
            if($take["VOTER_ID"]==$vid && $take["EMAIL_ID"]==$mail){
                $flag=1;
                break;
            }
        }

        if($flag==1){
            //$change="update voter set password='$pass' where voter_id='$vid'";
            // if($link->query($change)){
            //     //echo "Password changed.";

            //     $message = 'VALID CREDENTIALS';
			//  echo "<SCRIPT>
			//  	alert('$message')
			//  	window.location.replace('Login_Page.html');
			//  </SCRIPT>";
            // header("Location: set_pass.html");
            echo "<script>alert('VALID CREDENTIALS')
            window.location.replace('set_pass.html');
            </script>";
        }
        
        else
        {
            echo "<script>alert('INVALID CREDENTIALS')
            window.location.replace('forgot.html');
            </script>";
        }
    }
