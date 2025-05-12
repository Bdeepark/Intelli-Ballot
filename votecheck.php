<?php
    $link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
    $flag=0;
    $check="select * from `voter`";
    $check1=$link->query($check);
	while($take=$check1->fetch_assoc()){
        if($take["votestatus"]==0){
			$flag=1;
		}
    	}
	if($flag==1){
		echo "Results cannot be checked because all the voters has not casted their vote.";	
	}
	else{
		echo "Results can be displayed.";
		
	}
}
?>