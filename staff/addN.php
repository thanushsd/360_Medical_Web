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

    <div id="main-wrapper" >
        <div class="content-body">
            <div class="container-fluid">

        <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Nurse</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../sql/add_staff.php" method="post" enctype="multipart/form-data">
                                        

    <div class="avatar-upload">
        <div class="avatar-edit">
            <input name="pic" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(../images/users/user.png);">
            </div>
        </div>
    </div>
                                            
                                        <div style=" border: solid; border-color: #007a64; border-width: 1px; " class="mb-3 p-2 input-primary">
                                            <label>Select Title :</label><br>
                                            <input required value="Mr" name="title" type="radio"> Mr.
                                            <input value="Mrs" class="ml-5" name="title" type="radio"> Mrs.
                                            <input required value="Miss" class="ml-5" name="title" type="radio"> Miss
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required name="fname" type="text" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required name="lname" type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input maxlength="3" required type="number" name="age" class="form-control" placeholder="Age">
                                        </div>
                                        <div style=" border: solid; border-color: #007a64; border-width: 1px; " class="mb-3 p-2 input-primary">
                                            <label>Select Gender :</label><br>
                                            <input required value="Male" name="gender" type="radio"> Male
                                            <input required value="Female" class="ml-5" name="gender" type="radio"> Female
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input maxlength="12" minlength="10" required type="text" name="nic" class="form-control" placeholder="Employee NIC">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required name="email" type="text" class="form-control" placeholder="Head Nurse's Email">
                                            <div class="input-group-append">
                                                <span class="input-group-text">@gmail.com</span>
                                            </div>
                                        </div>
                                        
                                        <div class="input-group mb-3 input-primary">
                                            <input maxlength="12" required type="text" name="tel" class="form-control" placeholder="Phone No">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <textarea required name="address" placeholder="Employee Address" class="form-control" ></textarea>
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="uname" class="form-control" placeholder="Create Username">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="pw" class="form-control" placeholder="Create Password">
                                        </div>
                                        <input value="3" type="hidden" name="position">
                                        
     <input type="submit" class=" btn btn-primary" value="Add Head Nurse">
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