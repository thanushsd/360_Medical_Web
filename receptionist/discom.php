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

                <h2>Patient Discharged Successfully</h2>

                <?php 

    $aid=$_REQUEST["aid"];
    $dc=$_REQUEST["dc"];
    $rc=$_REQUEST["rc"];
    $mc=$_REQUEST["mc"];
    $oc=$_REQUEST["oc"];

    if ($oc==null) {
        $ooc=0;
    } else {
        $ooc=$oc;
    }

    $total=$dc+$rc+$mc+$ooc;
    $tax=$total/100*15;
    $gtotal=$total+$tax;

                ?>


<?php
    $aid=$_REQUEST["aid"];

    $sql=" SELECT * FROM admit WHERE aid=$aid";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {

        $docid=$row["docid"];
        $rnum=$row["rnum"];
        $apptime=$row["apptime"];
        $pname=$row["pname"];
        $page=$row["page"];
        $padd=$row["padd"];
        $ptel=$row["ptel"];
        $pemail=$row["pemail"];
        $pgen=$row["pgen"];
        $advp=$row["advp"];


}

?>


               
<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            <button id="printInvoice" onclick="window.location.href='dashboard.php' " class="btn btn-primary"><i class="fa fa-print"></i> Back To Home</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img style=" height: 90%; width: 30%; " src="../images/logot.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                                360<sup>0</sup> Medical
                            </a>
                        </h2>
                        <div>Colombo 07 , Sri Lanka</div>
                        <div>(011) 444-4444</div>
                        <div>help@360med.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $pname ?></h2>
                        <div class="address"><?php echo $padd ?></div>
                        <div class="email"><a href="mailto:<?php echo $pemail ?>"><?php echo $pemail ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 000<?php echo $aid ?></h1>
                        <div class="date">Date of Invoice: <?php echo date("Y/m/d") ?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right"></th>
                            <th class="text-right"></th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h3>Doctor Chargers</h3></td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="total"><?php echo $dc ?></td>
                        </tr>
                        <tr>
                            <td class="no">02</td>
                            <td class="text-left"><h3>Room Chargers</h3></td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="total"><?php echo $rc ?></td>
                        </tr>
                        <tr>
                            <td class="no">03</td>
                            <td class="text-left"><h3>Medicine Chargers</h3></td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="total"><?php echo $mc ?></td>
                        </tr>
                        <tr>
                            <td class="no">04</td>
                            <td class="text-left"><h3>Other Chargers</h3></td>
                            <td class="unit"></td>
                            <td class="qty"></td>
                            <td class="total"><?php echo $ooc ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>LKR <?php echo $total ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">VAT 15%</td>
                            <td>LKR <?php echo $tax ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>LKR <?php echo $gtotal ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <!-- <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div> -->
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    </div>
</div>
<div>
            <a class="btn btn-primary" href="dashboard.php">BACK TO HOME</a>
        </div>

<?php

$tdate=date("Y/m/d");

//REGISTER PROCESS
$sql1 = "UPDATE rooms SET status='0' WHERE rnum=$rnum";

if ($conn->query($sql1) === TRUE) {
} else {
  echo "Error updating record: " . $conn->error;
}

$sql2 = "UPDATE admit SET status='1' WHERE aid=$aid";

if ($conn->query($sql2) === TRUE) {
} else {
  echo "Error updating record: " . $conn->error;
}


$sql3=" INSERT INTO inv(aid,dc,rc,mc,ooc,total,tax,gtotal,date) 
VALUES('$aid','$dc','$rc','$mc','$ooc','$total','$tax','$gtotal','$tdate') ";

    //Execute command 2
    if ($conn->query($sql3) === TRUE) {
      
    } else {
      echo "Error: " . $sql3 . "<br>" . $conn->error;
    }

    ?>



<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #007a64
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #007a64
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #007a64
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #007a64
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #007a64;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #007a64
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #007a64;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #007a64;
    font-size: 1.4em;
    border-top: 1px solid #007a64
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #007a64;
    border-top: 1px solid #007a64;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>

<script type="text/javascript">
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>

                
        
                        </div>
                    </div>  
               </div>
</body>
</html>

