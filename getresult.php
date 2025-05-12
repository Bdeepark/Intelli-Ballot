<?php
session_start();
$pin=$_SESSION['pincode'];
$mysqli=new mysqli('localhost','root','','onlinevote');
if(!$mysqli){
	die("Connection failed");
}

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("select POLITICAL_PARTY,VOTES_RECEIVED from `candidate`,`candidatepin` where pin=$pin and candidate_id=Ccode");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>