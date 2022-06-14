<?php include '../sql/conn.php' ?>
<?php include '../components/connfile.php' ?>
<?php 
    if(!isset($_SESSION["recep"])) 
    {
        echo "<script>alert('You are not logged in!'); window.location.href='login.php' ;</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php include 'header.php';
          include 'sidebar.php';
	?>

	<div id="main-wrapper" >
		<div class="content-body">
            <div class="container-fluid">

            	<div>
            		<h2>Discharge Patient</h2>
            		<form>
            			<div class="input-group mb-3 input-primary">
<input type="search" name="appid" class="form-control" placeholder="Enter Admission Number">
<input type="submit" class="btn btn-primary" value="Search">
</div>
            			
            		</form>
            	</div>

            		<div class="row">
					<div class="col-12">
						<div class="table-responsive card-table">
							<table id="example5" class="display dataTablesCard table-responsive-xl ">
								<thead>
									<tr>
										
										<th>Admission ID</th>
										<th>Doctor</th>
										<th>P. Name</th>
										<th>P. Age</th>
										<th>P. Gender</th>
										<th>P Tel</th>
										<th>Advance Payment</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

	<?php
	$appid=$_REQUEST["appid"];

	$sql=" SELECT * FROM admit WHERE aid=$appid";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{

		$docid=$row["docid"];
		$rnum=$row["rnum"];
		$apptime=$row["apptime"];
		$pname=$row["pname"];
		$page=$row["page"];
		$ptel=$row["ptel"];
		$pemail=$row["pemail"];
		$pgen=$row["pgen"];
		$advp=$row["advp"];
?>

									<tr>
										<td><span class="text-nowrap">000<?php echo $appid;?></span></td>
										<td><?php echo $docid ?></td>
										<td><?php echo $pname ?></td>
										<td><?php echo $page ?></td>
										
										<td><span class="text-nowrap"><?php echo $pgen ?></span></td>
										<td><span class="text-dark"><?php echo $ptel ?></span></td>
										<td><span class="text-dark"><?php echo $advp ?> LKR</span></td>
										<td><span class="text-dark">Discharging</span></td>
										
										<td>

											
												
				<div >
					<form action="discharge.php" >
						<input type="hidden" name="aid" value="<?php echo $appid ?>">
						<input style="border-radius: 3px;" type="submit" value="Discharge" class="btn btn-primary mt-3 mb-3 p-2" >
					</form>
				</div>
										</td>												
									</tr>
    
<?php } ?>

					</tbody>
							</table>
						</div>
					</div>
				</div>

            </div>
        </div>
    </div>
</body>
