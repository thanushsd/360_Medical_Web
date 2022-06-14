<?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

	//form data getting
	$docid=$_REQUEST["docid"];
	$arrdate=date('Y-m-d', strtotime($_REQUEST['date']));
	$arrtime=$_REQUEST["arrtime"];
	$levtime=$_REQUEST["levtime"];
	
	//INSERT QUERY
	$sql=" INSERT INTO docdates(docid,arrdate,arrtime,levtime) 
	VALUES('$docid','$arrdate','$arrtime','$levtime') ";

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
		$_SESSION["docdates"]=$docid;
		if (isset($_SESSION["recep"])) {
			$link="receptionist/dates.php";
		}
		elseif (isset($_SESSION["admin"])) {
			$link="doctor/dates.php";
		}
	  echo "<script>window.location.href='../$link' ;</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	