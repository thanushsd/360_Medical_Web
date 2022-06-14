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

        <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Admit A Patient</h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="../sql/admitp.php" method="post" enctype="multipart/form-data">
                                            
                                        <div class="input-group mb-3 input-primary">
                                            <select class="form-control" name="doc" >
                                                <option>Select Doctor</option>
                                                <?php
    $sql=" SELECT * FROM doctor ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $name=$row["name"];
        $spec=$row["spec"];
        $docid=$row["docid"];
        
?>
                                                
                                                <option  value="<?php echo $docid ?>" >Dr. <?php echo $name ?> ( <?php echo $spec ?> )</option>

                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div class="input-group mb-3 input-primary">
<select class="form-control" name="room" >
<option>Select Room</option>

<?php
    $sql=" SELECT * FROM rooms WHERE status=0 ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $rnum=$row["rnum"];
        $rid=$row["rid"];
        $ac=$row["ac"];
        $ft=$row["ft"];        
        $hw=$row["hw"];        
        $ek=$row["ek"];        
        $ab=$row["ab"];        
        $chrg=$row["chrg"]; 

        if ($ac==1) {
            $acs="Yes";
        }
        else{
            $acs="No";
        }

        if ($ft==1) {
            $fts="Yes";
        }
        else{
            $fts="No";
        }

        if ($hw==1) {
            $hws="Yes";
        }
        else{
            $hws="No";
        }

        if ($ek==1) {
            $eks="Yes";
        }
        else{
            $eks="No";
        }

        if ($ab==1) {
            $abs="Yes";
        }
        else{
            $abs="No";
        }

        


        if ($status==0) {
            $st="Available";
        } elseif ($status==1) {
            $st="Reserved";
        }elseif ($status==2) {
            $st="In Progress";
        }
       
?>                
<option  value="<?php echo $rnum ?>" >Room : <?php echo $rnum ?> | LKR <?php echo $chrg ?>/= | 
    <br><br> Air Conditioning : <?php echo $acs ?> | TV : <?php echo $fts ?> | Hot Water : <?php echo $hws ?> | Electric Kettle : <?php echo $eks ?> | Additional Bed : <?php echo $abs ?> </option>
<?php } ?>
</select>
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="pname" class="form-control" placeholder="Patient's Name">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="number" name="page" class="form-control" placeholder="Patient's Age">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <input required maxlength="12" minlength="10" type="text" name="pnic" class="form-control" placeholder="Patient's NIC">
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
                                            <input required maxlength="12" minlength="9" type="text" name="ptel" class="form-control" placeholder="Patient's Phone No">
                                        </div>
                                        <div class="input-group mb-3 input-primary">
                                            <textarea required placeholder="Patient's Address" name="padd" class="form-control"></textarea>
                                        </div>
                                        <label>Select Admitted Date</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input required type="date" name="date" class="form-control" >
                                        </div>
                                          <div class="input-group mb-3 input-primary">
                                            <input required type="number" name="advp" class="form-control" placeholder="Advanced Payment (LKR) ">
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