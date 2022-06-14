<?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

	//form data getting
	$name=$_REQUEST["name"];
	$nic=$_REQUEST["nic"];
	$spec=$_REQUEST["spec"];
	$email=$_REQUEST["email"];
	$tel=$_REQUEST["tel"];
	$uname=$_REQUEST["uname"];
	$pw=$_REQUEST["pw"];
	$date=date("Y-m-d H:i:s");

	//image 1
$file_tmp1 = $_FILES['pic']['tmp_name'];
$file_name1 = "v".$aid."_".rand(1,100)."_".$_FILES['pic']['name'];
$target_file1 = "../doctor/img/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }


	//INSERT QUERY
	$sql=" INSERT INTO doctor(pic,name,nic,spec,email,tel,uname,pw,date,status) 
	VALUES('$file_name1','$name','$nic','$spec','$email','$tel','$uname','$pw','$date',0) ";

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
	  echo "<script>window.location.href='../doctor/doctors.php' ;</script>";
	  $_SESSION["dadd"]=$name;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	