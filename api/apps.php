<?php 

include '../sql/conn.php';

$username=$_POST["uname"];
$pw=$_POST["pw"];

$querySt="INSERT INTO test (uname,pw) VALUES ('$username','$pw')";

//Execute command 2
	if ($conn->query($sql) === TRUE) {
		echo json_encode("Inserted Data !!!");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>