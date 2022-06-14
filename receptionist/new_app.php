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
    <?php
    $docid=$_REQUEST["docid"];
    $dtind=$_REQUEST["dtind"];
    $appdate=date('Y-m-d', strtotime($_REQUEST['appdate']));
    $apptime=$_REQUEST["apptime"];
    $sql=" SELECT * FROM doctor WHERE docid=$docid";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $dname=$row["name"];
       }

       $sql=" SELECT * FROM appoinment WHERE dtind=$dtind";
       $x=1;
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $appid=$row["appid"];
        $x=$x+1;
       }
        
?>



	<div id="main-wrapper" >
		<div class="content-body">
            <div class="container-fluid">

		<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Channel A Doctor</h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../sql/add_app.php" method="get" enctype="multipart/form-data">
                                            
                                        <div class="input-group mb-3 input-primary">
                                            <input name="dname" type="text" class="form-control" disabled value="Doctor : Dr.<?php echo $dname ?>">
                                            <input type="hidden" name="docid" value="<?php echo $docid ?>">
                                            <input type="hidden" name="dtind" value="<?php echo $dtind ?>">
                                        </div>
                                        <div class="input-group mb-3 input-primary">


                                            <input type="text" class="form-control" disabled value="Appoinment Number : 0<?php echo $x  ?>">
                                            <input type="hidden" name="appno" value="<?php echo $x ?>">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="text" class="form-control" disabled value="Appoinment on <?php echo $appdate ?> | Doctor Arriving at <?php echo $apptime ?>">
                                        </div>
                <input type="hidden" name="appdate" value="<?php echo $appdate ?>">
                <input type="hidden" name="apptime" value="<?php echo $apptime ?>">

                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="pname" class="form-control" placeholder="Patient's Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="page" class="form-control" placeholder="Patient's Age">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input maxlength="12" minlength="10" required type="text" name="pnic" class="form-control" placeholder="Patient's NIC">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <select name="pgen" class="form-control">
                                                <option >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required name="pemail" type="text" class="form-control" placeholder="Patient's E-mail Address">
                                            <div class="input-group-append">
                                                <span class="input-group-text">@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="ptel" class="form-control" placeholder="Patient's Phone No">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <textarea placeholder="Patient's Address" name="padd" class="form-control"></textarea>
                                        </div>

                                        <div class="row">
    <div class="col-md-6 order-md-6 mb-4 input-primary ">
      <ul class="list-group mb-3 ">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <?php 
             $charge=1900;
             $total=1900+450;
            ?>
            <h6 class="my-0">Doctor Charge :</h6>
                      </div>
          <span class="text-muted">Rs.<?php echo $charge ?></span>
        </li>
  
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Hospital Charge :</h6>
          </div>
          <span class="text-muted">Rs.450</span>
        </li>
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Total :</span>
          <strong>Rs.<?php echo $total ?></strong>
        </li>
      </ul>
    </div>
</div>

<input type="hidden" name="pcharge" value="<?php echo $total ?>">

<div class=" mb-3 input-primary">                                            
                                            <input value="Paid" type="radio" name="pay" > Paid
                                            <input value="Payment Pending" class="ml-5" type="radio" name="pay" > Payment Pending
                                        </div>
                                        
                                        
     <input type="submit" class=" btn btn-primary" value="Complete Booking">
                                        </div>   
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>	
	           </div>
</body>
</html>

<style type="text/css">
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>

<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>