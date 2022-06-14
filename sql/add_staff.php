 <?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

	//form data getting
	$title=$_REQUEST["title"];
	$fname=$_REQUEST["fname"];
	$lname=$_REQUEST["lname"];
	$age=$_REQUEST["age"];
	$nic=$_REQUEST["nic"];
	$eemail=$_REQUEST["email"];
	$email=$eemail."@gmail.com";
	$tel=$_REQUEST["tel"];
	$gender=$_REQUEST["gender"];
	$address=addslashes($_REQUEST["address"]);
	$uname=$_REQUEST["uname"];
	$pw=$_REQUEST["pw"];
	$position=$_REQUEST["position"];
	$date=date("Y-m-d H:i:s");

	//image 1
$file_tmp1 = $_FILES['pic']['tmp_name'];
$file_name1 = "v".$aid."_".rand(1,100)."_".$_FILES['pic']['name'];
$target_file1 = "../staff/img/".$file_name1;
if($file_tmp1!="")
{ move_uploaded_file($file_tmp1,$target_file1); }
else { $file_name1=""; }


	//INSERT QUERY
	$sql=" INSERT INTO staff(pic,title,fname,lname,age,nic,adress,email,position,gender,tel,uname,pw,date,status) 
	VALUES('$file_name1','$title','$fname','$lname','$age','$nic','$address','$email','$position','$gender','$tel','$uname','$pw','$date',0) ";

	
	if ($position==2) {
		$link="hnurse.php";
	}
	elseif ($position==3) {
		$link="nurse.php";
	} elseif ($position==4) {
		$link="recep.php";
	} ?>


	<?php

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
	  echo "<script>window.location.href='../staff/$link' ;</script>";
	  $_SESSION["staff"]=$fname;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	