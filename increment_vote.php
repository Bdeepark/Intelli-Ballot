<?php
session_start();
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
//echo "<script>alert('".$_SESSION['voter_name']."')</script>";

// if($_SESSION['voter_id']=='')
// {
//     //header("Location:Login_Page.html");
    //  echo "<script>alert('Your Vote is done!!!')
    //     </script>";
// }

$c=$_GET['ccode'];
echo $c;
$sql="Update candidate Set votes_received = votes_received + 1 where candidate_id='$c'";
if($link->query($sql))
{
    $v=$_SESSION['voter_id'];
    $sql1="Update voter Set votestatus = 1 where voter_id='$v'";
    if($link->query($sql1)){
        // echo "<script>alert('You have already voted!!!')
            echo "<script>
            window.location.replace('logout.php');
          </script>";

}
    }
?>
