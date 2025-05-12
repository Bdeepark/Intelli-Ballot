<html>
<body>
<form method="post" action="resultpage.php">
	<p> Enter the Pincode for which the results should be displayed----->>>> </p>
<label for="pin">Pincode:</label>
<input type="pin" name="pin" id="pin" placeholder="Enter the pincode">
<input type="submit" value="Enter">
</form>
</body>
</html>





<?php
$pin=$_POST['pin'];
$link=new mysqli('localhost','root','','onlinevote');
if(!$link){
	die("Connection failed");
}
else{
    $check="select * from `candidate`,`candidatepin` where pin='$pin' and candidate_id=Ccode";
    $check1=$link->query($check);
	if($check1->fetch_assoc()==''){
		echo "<SCRIPT>
				alert('Vote is not going on in this area.')
				window.location.replace('enter.html');
			</SCRIPT>";
	}
	$check1=$link->query($check);
	echo "<table border=2>";
    echo "<tr>";
	echo "<th>CANDIDATE ID";
	echo "<th>CANDIDATE NAME";
	echo "<th>POLITICAL PARTY";
	echo "<th>POLITICAL PARTY SYMBOL";
	echo "<th>TOTAL VOTES RECEIVED";
	echo "</tr>";
	while($take=$check1->fetch_assoc()){
        echo "<tr>";
		echo "<td>".$take["CANDIDATE_ID"];
		echo "<td>".$take["CANDIDATE_NAME"];
        echo "<td>".$take["POLITICAL_PARTY"];
		$img1=$take['IMAGE'];
		echo "<td><img src='./voterpic/$img1' height='100' width='150'>";
		echo "<td>".$take["VOTES_RECEIVED"];
		echo "</tr>";
    }
    echo "</table>";
	$maxivote="select * from candidate,candidatepin where votes_received=(select max(votes_received) from candidate,candidatepin where pin='$pin' and ccode=candidate_id) and pin='$pin' and ccode=candidate_id";
	$max1=$link->query($maxivote);
	echo "The winner of the election is:";
	echo "<table border=2>";
	while($take=$max1->fetch_assoc()){
		echo "<tr>
		<td>".$take["CANDIDATE_NAME"].
		"</tr>";
	}
	echo "</table>";
}

?>