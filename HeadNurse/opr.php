<?php include '../sql/conn.php' ?>
<?php include '../components/connfile.php' ?>
<?php 
    if(!isset($_SESSION["headn"])) 
    {
        echo "<script>alert('You are not logged in!'); window.location.href='login.php' ;</script>";
    }
?>

    <?php 
   $rnum=$_SESSION["opradd"];
    if(isset($_SESSION["opradd"])) 
    {
        ?> 
   <body onload="add()" >
    
    </body>
        <?php
    }
    unset($_SESSION["opradd"])
?>

<script type="text/javascript">
        function add() {
            Swal.fire({
  icon: 'success',
  title: 'OP Room Reserved',
  text: 'OP Room Reservstion Successfully Added ',
  confirmButtonColor: "#007a64",
  confirmButtonText: "Okay",
})
        }
    </script>

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

        <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add OP Room Task</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../sql/addopr.php" method="post" enctype="multipart/form-data">        
                                        <div class="input-group mb-3 input-primary">
                                            <select class="form-control" name="opno">
                                                <option value="OP Room 01" >Select OP Room</option>

                                                <option value="OP Room 01" >OP Room 01</option>

                                                <option value="OP Room 02" >OP Room 02</option>

                                                <option value="OP Room 03" >OP Room 03</option>

                                                <option value="OP Room 04" >OP Room 04</option>

                                                <option value="OP Room 05" >OP Room 05</option>     
                                            </select>
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input name="pname" type="text" class="form-control" placeholder="Patient Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="text" name="dname" class="form-control" placeholder="Doctor Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="date" name="date" class="form-control" placeholder="Doctor Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="time" name="time" class="form-control" placeholder="Doctor Name">
                                        </div>
                                        
     <input type="submit" class=" btn btn-primary" value="Add OP Room Reservation">
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
  top: 5px;
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