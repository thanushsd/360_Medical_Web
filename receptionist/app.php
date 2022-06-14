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
            		<h2>Appoinments</h2>
            		<form>
            			<div class="input-group mb-3 input-primary">
<input type="search" name="appid" class="form-control" placeholder="Enter Appoinment Number">
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
										
										<th>App ID</th>
										<th>Date</th>
										<th>Time</th>
										<th>Doctor</th>
										<th>P. Name</th>
										<th>P. Age</th>
										<th>P. Gender</th>
										<th>Charge</th>
										<th>P. Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>

	<?php
	$appid=$_REQUEST["appid"];


	if ($appid==null) { 
		$sql=" SELECT * FROM appoinment ORDER BY `appoinment`.`appdate` DESC ";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{

		$appid=$row["appid"];
		$appdate=$row["appdate"];
		$apptime=$row["apptime"];
		$pname=$row["pname"];
		$page=$row["page"];
		$pgen=$row["pgen"];
		$docid=$row["docid"];
		$pcharge=$row["pcharge"];
		$payment=$row["payment"];
?>

									<tr>
										<td><span class="text-nowrap">000<?php echo $appid;?></span></td>
										<td><?php echo $appdate ?></td>
										<td><?php echo $apptime ?></td>

										<td><?php echo $docid ?></td>
										<td><?php echo $pname ?></td>
										
										<td><span class="text-nowrap"><?php echo $page ?></span></td>
										<td><span class="text-dark"><?php echo $pgen ?></span></td>
										<td><span class="text-dark"><?php echo $pcharge ?></span></td>
										<td><span class="text-dark"><?php echo $payment ?></span></td>
										<td>

											
												
				<div >
					<form action="new_app.php" >
						<input type="hidden" name="appdate" value="<?php echo $arrdate ?>">
						<input type="hidden" name="apptime" value="<?php echo $arrtime ?>">
						<input type="hidden" name="docid" value="<?php echo $docid ?>">
						<input type="hidden" name="dtind" value="<?php echo $dtind ?>">
						<input style="border-radius: 3px;" type="submit" value="View Details" class="btn btn-primary mt-2 mb-2 p-1" >
					</form>
				</div>
										</td>												
									</tr>
    
<?php } ?>

					
	<?php }

	else {
	$sql=" SELECT * FROM appoinment WHERE appid=$appid";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{

		$appid=$row["appid"];
		$appdate=$row["appdate"];
		$apptime=$row["apptime"];
		$pname=$row["pname"];
		$page=$row["page"];
		$pgen=$row["pgen"];
		$pcharge=$row["pcharge"];
		$payment=$row["payment"];
?>

									<tr>
										<td><span class="text-nowrap">000<?php echo $appid;?></span></td>
										<td><?php echo $appdate ?></td>
										<td><?php echo $apptime ?></td>
										<td><?php echo $pname ?></td>
										
										<td><span class="text-nowrap"><?php echo $page ?></span></td>
										<td><span class="text-dark"><?php echo $pgen ?></span></td>
										<td><span class="text-dark"><?php echo $pcharge ?></span></td>
										<td><span class="text-dark"><?php echo $payment ?></span></td>
										<td>

											
												
				<div >
					<form action="new_app.php" >
						<input type="hidden" name="appdate" value="<?php echo $arrdate ?>">
						<input type="hidden" name="apptime" value="<?php echo $arrtime ?>">
						<input type="hidden" name="docid" value="<?php echo $docid ?>">
						<input type="hidden" name="dtind" value="<?php echo $dtind ?>">
						<input style="border-radius: 3px;" type="submit" value="View Details" class="btn btn-primary mt-2 mb-2 p-1" >
					</form>
				</div>
										</td>												
									</tr>
    
<?php }} ?>

					</tbody>
							</table>
						</div>
					</div>
				</div>

            </div>
        </div>
    </div>
</body>
