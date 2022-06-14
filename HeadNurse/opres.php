<?php include '../sql/conn.php' ?>
<?php include '../components/head.php' ?>
<?php include '../components/connfile.php' ?>
<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>

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
						<h2 class="text-black font-w600">OP Room Reservations</h2>
						<p class="mb-0"></p>
					</div>
					<div>
						<a href="opr.php" class="btn btn-primary mr-3" >+ New Reservstion</a>
						<a href="appoinment.php" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>View Appoinments</a>
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
										<th>Doctor Name</th>
										<th>Date</th>
										<th>Time</th>
										
									</tr>
								</thead>
								<tbody>


	<?php
	$sql=" SELECT * FROM oproom";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$oprno=$row["oprno"];
		$id=$row["oprid"];
		$pname=$row["pname"];
		$dname=$row["dname"];
		$date=$row["date"];
		$time=$row["time"];

?>

									<tr>
										
										<td><span class="text-nowrap"><?php echo $id;?></span></td>
										<td><?php echo $oprno ?></td>
										<td><?php echo $pname ?></td>
										<td><?php echo $dname ?> </td>
										<td><?php echo $date ?></td>
										<td><?php echo $time ?></td>
										<td>
											<div class="dropdown ml-auto text-right">
												<div class="btn-link" data-toggle="dropdown">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="view.php?docid=<?php echo $docid ?>">View Information</a>
													<a class="dropdown-item" href="#">Edit Details</a>
													<a class="dropdown-item" href="#">Remove Doctor</a>
												</div>
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



 