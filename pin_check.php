

<?php
    $pin=$_POST['pin'];
    $link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
    $flag=0;
    $check="select * from `checkpin`";
    $check1=$link->query($check);
	while($take=$check1->fetch_assoc()){
        if($take["pin"]==$pin){
			$flag=1;
		}
    }
    $check="select * from `checkpin`";
    $check1=$link->query($check);
    if($flag==1){
        #echo "Yes,vote can de done!!!";
        header("Location: voting_page.html");
    }
    else
    {
        echo "There is no election going in this area....";
        header("Location: pincode_not_found.html");

    }
}
?>