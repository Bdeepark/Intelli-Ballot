<?php
    session_start();
    $pass=$_POST['pass'];
    $conf=$_POST['conf'];
    $vid=$_SESSION['vid'];
    $link=new mysqli('localhost','root','','onlinevote');
    if(!$link){
        die("Connection failed");
    }
    else{
        if($pass==$conf){
            $change="update voter set password='$pass' where voter_id='$vid'";
            if($link->query($change)){
                //echo "Password changed.";
                unset($_SESSION['vid']);
			echo "<SCRIPT>
				alert('Password Changed.')
				window.location.replace('Login_Page.html');
			</SCRIPT>";
            }
        }
        else{
            echo "<SCRIPT>
				alert('Passwords do not match.Please re-enter !!!')
				window.location.replace('set_pass.html');
			</SCRIPT>";
        }
    }
?>