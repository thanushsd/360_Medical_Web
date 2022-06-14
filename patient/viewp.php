<?php include '../sql/conn.php' ?>
<?php include '../components/head.php' ?>
<?php include '../components/connfile.php' ?>
<?php include '../components/header.php' ?>
<?php include '../components/sidebar.php' ?>

 <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
        <!-- Preloader end -->

        <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Welly - Hospital Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
	<!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

 <?php 
    $fname=$_SESSION["staff"];
    if(isset($_SESSION["staff"])) 
    {
        ?> 
   <body onload="add()" >
    
    </body>
        <?php
    }
    unset($_SESSION["staff"])
?>

<script type="text/javascript">
        function add() {
            Swal.fire({
  icon: 'success',
  title: 'Nurse Added Successfully!',
  text: 'Employee <?php echo $fname ?> Added ',
  confirmButtonColor: "#007a64",
  confirmButtonText: "Okay",
})
        }
    </script>

<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-sm-4 mb-3">
					<div class="mr-auto">
						<h2 class="text-black font-w600">All Patients</h2>
						<p class="mb-0"></p>
					</div>
				</div>
				<!-- Add Order -->
				<div class="modal fade" id="addOrderModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Contact</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Patient Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Patient ID</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Disease</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Date Check In</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive card-table">
							<table id="example5" class="display dataTablesCard table-responsive-xl">
								<thead>
									<tr>
										
										<th>ID</th>
										<th>Patient Name</th>
										<th>Admitted Date</th>
										<th>Room No</th>
										<th>Age</th>
										<th>NIC</th>
										<th>Email</th>
										<th>Adress</th>
										<th>Phone No</th>
										<th>Advance Payment</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>


	<?php
	$sql=" SELECT * FROM admit";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$pname=$row["pname"];
		$aid=$row["aid"];
		$date=$row["date"];
		$rnum=$row["rnum"];
		$page=$row["page"];
		$pgen=$row["pgen"];
		$pnic=$row["pnic"];
		$aid=$row["aid"];
		$ptel=$row["ptel"];
		$padd=$row["padd"];
		$advp=$row["advp"];
		$pemail=$row["pemail"];
		$status=$row["status"];

		if ($status==0) {
		$st="In Treatment";
	} else{
		$st="Recovered";
	}
?>

									<tr>
										<td><span class="text-nowrap"><?php echo $aid;?></span></td>
										<td><?php echo $pname ?></td>
										<td><?php echo $date ?></td>
										<td><?php echo $rnum ?></td>
										
										<td><span class="text-nowrap"><?php echo $page ?></span></td>

										<td><span class="text-dark"><?php echo $pnic ?></span></td>
										
										<td><span class="text-dark"><?php echo $pemail ?></span></td>

										<td><span class="text-dark"><?php echo $padd ?></span></td>

										<td><span class="text-dark"><?php echo $ptel ?></span></td>

										<td><span class="text-dark"><?php echo $advp ?></span></td>

										<td><span class="text-dark"><?php echo $st ?></span></td>

										

											
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
        <br>
        <br>

        <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>

    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script>
		(function($) {
			var table = $('#example5').DataTable({
				searching: false,
				paging:true,
				select: false,
				//info: false,         
				lengthChange:false 
				
			});
			$('#example tbody').on('click', 'tr', function () {
				var data = table.row( this ).data();
				
			});
		})(jQuery);
	</script>



 