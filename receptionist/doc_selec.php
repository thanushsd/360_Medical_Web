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
            		<h2>Select Doctor</h2>
            		<form>
            			<div class="input-group mb-3 input-primary">
                                            <select name="docid" class="form-control">
                                                <option >Select Doctor</option>
            			 <?php
    $sql=" SELECT * FROM doctor";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    { 
        $name=$row["name"];
        $spec=$row["spec"];
        $docid=$row["docid"];
        $charge=1800;
        $total = $charge+450
         ?>

        <option value="<?php echo $docid ?>" ><?php echo $name ?> ( <?php echo $spec ?> )</option>
       <?php }

?>
</select>
<input type="submit" class="btn btn-primary" value="Check Available Dates">
</div>
            			
            		</form>
            	</div>

            		<div class="row">
					<div class="col-12">
						<div class="table-responsive card-table">
							<table id="example5" class="display dataTablesCard table-responsive-xl ">
								<thead>
									<tr>
										
										<th>Doctor</th>
										<th>Date</th>
										<th>Arriving Time</th>
										<th>Leaving Time</th>
									</tr>
								</thead>
								<tbody>

	<?php
	$docid=$_REQUEST["docid"];
	$sql=" SELECT * FROM docdates WHERE docid=$docid";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
	
		$arrdate=$row["arrdate"];
		$arrtime=$row["arrtime"];
		$levtime=$row["levtime"];
		$dtind=$row["dtind"];
?>

									<tr>
										<td><span class="text-nowrap">#D-000<?php echo $docid;?></span></td>
										<td><?php echo $arrdate ?></td>
										<td><?php echo $arrtime ?></td>
										<td><?php echo $levtime ?></td>
										
										<td><span class="text-nowrap"><?php echo $tel ?></span></td>
										<td><span class="text-dark"><?php echo $st ?></span></td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													
												</div>
				<div >
					<form action="new_app.php" >
						<input type="hidden" name="appdate" value="<?php echo $arrdate ?>">
						<input type="hidden" name="apptime" value="<?php echo $arrtime ?>">
						<input type="hidden" name="docid" value="<?php echo $docid ?>">
						<input type="hidden" name="dtind" value="<?php echo $dtind ?>">
						<input style=" border-radius: 5px; " type="submit" value="Book" class="btn btn-primary m-2" >
					</form>
				</div>
											</div>
										</td>												
									</tr>
    
<?php } ?>

<?php 

$q=" SELECT * FROM appoinment WHERE dtind=$dtind";
       $x=1;
    $result=$conn->query($q);
    while($row=$result->fetch_assoc())
    {
        $appid=$row["appid"];
        $x=$x+1;
       }

											 ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

            </div>
        </div>
    </div>
</body>
