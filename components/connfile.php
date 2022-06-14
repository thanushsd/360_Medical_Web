<?php include '../sql/conn.php' ?>

<?php
	$uid=$_SESSION["admin"];
	$sql=" SELECT * FROM staff WHERE uid='$uid' ";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$fname=$row["fname"];
		$lname=$row["lname"];
		$gender=$row["gender"];
		$pic=$row["pic"];
		
	}
?>