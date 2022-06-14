<?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

	//form data getting
	$dname=$_REQUEST["docid"];
	$dtind=$_REQUEST["dtind"];
	$appno=$_REQUEST["appno"];
	$appdate=date('Y-m-d', strtotime($_REQUEST['appdate']));
	$apptime=$_REQUEST["apptime"];
	$pname=$_REQUEST["pname"];
	$page=$_REQUEST["page"];
	$pnic=$_REQUEST["pnic"];
	$pgen=$_REQUEST["pgen"];
	$pemail=$_REQUEST["pemail"];
	$ptel=$_REQUEST["ptel"];
	$add=$_REQUEST["padd"];
	$padd=addslashes($add);
	$pcharge=$_REQUEST["pcharge"];
	$payment=$_REQUEST["pay"];


	$sql=" INSERT INTO appoinment(docid,dtind,appnum,appdate,apptime,pname,page,pnic,pgen,padd,pemail,ptel,pcharge,payment,status) 
	VALUES('$dname','$dtind','$appno','$appdate','$apptime','$pname','$page','$pnic','$pgen','$padd','$pemail','$ptel','$pcharge','$payment',0) ";

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
	  echo "<script>window.location.href='../appoinment/doc_selec.php' ;</script>";
	  $_SESSION["dadd"]=$name;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	