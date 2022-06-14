<?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

//form data getting
$rnum=$_REQUEST["rnum"];
	
if(isset($_REQUEST["ac"]))
{
  $ac=$_REQUEST["ac"];
}

else{
	$ac=0;
}

if(isset($_REQUEST["ft"]))
{
  $ft=$_REQUEST["ft"];
}

else{
	$ft=0;
}

if(isset($_REQUEST["hw"]))
{
  $hw=$_REQUEST["hw"];
}

else{
	$hw=0;
}

if(isset($_REQUEST["ek"]))
{
  $ek=$_REQUEST["ek"];
}

else{
	$ek=0;
}

if(isset($_REQUEST["ab"]))
{
  $ab=$_REQUEST["ab"];
}

else{
	$ab=0;
}
	
	
	//INSERT QUERY
	$sql=" INSERT INTO rooms(rnum,ac,ft,hw,ek,ab,status) 
	VALUES('$rnum','$ac','$ft','$hw','$ek','$ab',0) ";

	//Execute command 2
	if ($conn->query($sql) === TRUE) {
		$_SESSION["radd"]=$rnum;
	  echo "<script>window.location.href='../staff/aR.php' ;</script>";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	?>

	