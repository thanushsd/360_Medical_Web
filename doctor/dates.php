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
echo $docid=$_SESSION["docdates"];
	if(isset($_SESSION["docdates"])) 
	{
		?> 
   <body onload="add()" >
   	
   	</body>
		<?php
	}
	unset($_SESSION["docdates"])
?>

<script type="text/javascript">
		function add() {
			Swal.fire({
  icon: 'success',
  title: 'Dates Added',
  text: 'Dates For Doctor #D-000<?php echo $docid ?> ',
  confirmButtonColor: "#007a64",
  confirmButtonText: "Okay",
})
		}
	</script>


	<div id="main-wrapper" >
		<div class="content-body">
            <div class="container-fluid">

            	<div>
            		<h2>Set Doctor Dates & Times</h2>
            		<form action="../sql/dates.php" >

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
                                            </select><br><br></div>

                <label>Arrving Date</label>
                <div class="input-group mb-3 input-primary">
                                            <input name="date" type="date" class="form-control" >
                                        </div>
                <label>Arrving Time</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input name="arrtime" type="time" class="form-control" >
                                        </div>
                                        <label>Leaving Time</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input name="levtime" type="time" class="form-control" >
                                        </div>
                                        <input value="Add Dates" type="submit" class="btn btn-primary">
            		</form>
            	</div>

            </div>
        </div>
    </div>
</body>
