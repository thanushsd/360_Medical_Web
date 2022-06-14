<?php include 'conn.php'; ?>
<?php

$pname=$_REQUEST["pname"];
$dname=$_REQUEST["dname"];
$oprno=$_REQUEST["opno"];
$time=$_REQUEST["time"];
$date=date('Y-m-d', strtotime($_REQUEST['date']));

	
	//INSERT QUERY
	$sql=" INSERT INTO oproom(oprno,pname,dname,date,time,status) 
	VALUES('$oprno','$pname','$dname','$date','$time',1) ";

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
		$_SESSION["opradd"]=$pname;
	  echo "<script>window.location.href='../HeadNurse/opr.php' ;</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	