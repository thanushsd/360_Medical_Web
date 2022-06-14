<?php include 'conn.php' ?>

<?php 
//LOGIN PROCESS
if(isset($_REQUEST["login_form"]))
{
	 $uname=$_REQUEST["uname"];
	 $pw=$_REQUEST["pw"];

	$login_check=0;
	// $sroll="student";
	
	$sql=" SELECT * FROM staff WHERE uname='$uname' AND pw='$pw'";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$login_check=1;
	 $uid=$row["uid"];
		$email=$row["email"];
	$sql=" SELECT * FROM staff WHERE uid='$uid' ";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$roll=$row["position"];
	}
	}
	// $sroll="student";
	// $aroll="admin";

	if($login_check==1 && $roll=="4" )
	{
		$_SESSION["recep"]=$uid;
		$_SESSION["login"]=$uid;
		header('Location: ../receptionist/dashboard.php'); exit;
	}

		elseif ($login_check==1 && $roll=="admin") 
		{
		$_SESSION["admin"]=$uid;
		$_SESSION["login"]=$uid;
		header('Location: ../admin/dashboard.php'); exit;
		}

		elseif ($login_check==1 && $roll=="2") 
		{
		$_SESSION["headn"]=$uid;
		$_SESSION["login"]=$uid;
		header('Location: ../HeadNurse/dashboard.php'); exit;
		}

		elseif ($login_check==1 && $roll=="3") 
		{
		$_SESSION["nurse"]=$uid;
		$_SESSION["login"]=$uid;
		header('Location: ../nurse/dashboard.php'); exit;
		}

	else
	{
		echo "<script>alert('Invalid login Or Your Account Has Not Approved Yet!'); window.location.href='../index.php' ;</script>";
	}
}


?>
