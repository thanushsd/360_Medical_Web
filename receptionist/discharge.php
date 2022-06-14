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

                <h2>Complete This Step For Finish Discharging</h2><hr>

                <?php
    $appid=$_REQUEST["aid"];

    $sql=" SELECT * FROM admit WHERE aid=$appid";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {

        $docid=$row["docid"];
        $rnum=$row["rnum"];
        $apptime=$row["apptime"];
        $pname=$row["pname"];
        $page=$row["page"];
        $ptel=$row["ptel"];
        $pemail=$row["pemail"];
        $pgen=$row["pgen"];
        $advp=$row["advp"];


?>

                <div>
                <img  style=" display: inline-block;  " src="../images/anim3.gif">
                <h4 style=" display: inline-block; " >Discharging In Process Of Patient <b><?php echo $pname ?></b> In Room <b><?php echo $rnum ?></b></h4>
                </div>

                    <hr>

                <form action="discom.php" method="get" >
                    
                    
                    <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="dc" class="form-control" placeholder="Doctor Chargers">
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="rc" class="form-control" placeholder="Room Chargers">
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <input required type="text" name="mc" class="form-control" placeholder="Medicine Chargers">
                                        </div>

                                        <div class="input-group mb-3 input-primary">
                                            <input type="text" name="oc" class="form-control" placeholder="Other Chagrge ( If Have )">
                                        </div>
                                        <input type="hidden" name="aid" value="<?php echo $appid ?>">
                                        <input class="btn btn-primary" type="submit" value="Complete Discharge">
                </form>
<?php } ?>
        
                        </div>
                    </div>  
               </div>
</body>
</html>

