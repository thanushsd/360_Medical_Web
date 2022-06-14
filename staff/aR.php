<?php include '../sql/conn.php' ?>
<?php include '../components/connfile.php' ?>
<?php 
    if(!isset($_SESSION["admin"])) 
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

	<?php include '../components/header.php';
          include '../components/sidebar.php';
	?>

	<?php 
   $rnum=$_SESSION["radd"];
	if(isset($_SESSION["radd"])) 
	{
		?> 
   <body onload="add()" >
   	
   	</body>
		<?php
	}
	unset($_SESSION["radd"])
?>

<script type="text/javascript">
		function add() {
			Swal.fire({
  icon: 'success',
  title: 'Room Added',
  text: 'Room <?php echo $rnum ?> Successfully Added ',
  confirmButtonColor: "#007a64",
  confirmButtonText: "Okay",
})
		}
	</script>


	<div id="main-wrapper" >
		<div class="content-body">
            <div class="container-fluid">

            	<div>
            		<h2>Add New Room</h2>
            		<form action="../sql/addR.php" >

            	
                <div class="input-group mb-3 input-primary">
                                        <input name="rnum" type="text" class="form-control" placeholder="Enter Room Number" >
                </div>

                <hr>
                <h5>Select Facilities</h5>
                <div class="mb-3 input-primary">
                <input name="ac" type="radio" value="1" > Air Conditioning
                </div>

                <div class="mb-3 input-primary">
                <input name="ft" type="radio" value="1" > Flatscreen TV
                </div>

                <div class="mb-3 input-primary">
                <input name="hw" type="radio" value="1" > Hot Water
                </div>

                <div class="mb-3 input-primary">
                <input name="ek" type="radio" value="1" > Electric Kettle
                </div>

                <div class="mb-3 input-primary">
                <input name="ab" type="radio" value="1" > Another Bed
                </div>
                
                <input value="Add Room" type="submit" class="btn btn-primary">
            		</form>
            	</div>

            </div>
        </div>
    </div>
</body>
