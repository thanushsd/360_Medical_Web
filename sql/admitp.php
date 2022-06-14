<?php include 'conn.php'; ?>
<?php

//REGISTER PROCESS

//form data getting
$doc = $_REQUEST["doc"];
$room = $_REQUEST["room"];
$pname = $_REQUEST["pname"];
$page = $_REQUEST["page"];
$pnic = $_REQUEST["pnic"];
$pgen = $_REQUEST["pgen"];
$pemail = $_REQUEST["pemail"];
$ptel = $_REQUEST["ptel"];
$add = $_REQUEST["padd"];
$padd = addslashes($add);
$advp = $_REQUEST["advp"];
$advp = $_REQUEST["advp"];
$addate = date('Y-m-d', strtotime($_REQUEST['date']));
$email = $pemail.'@gmail.com';

echo '<center><h1 style="margin-top : 20px" >Patient Added Successfully</h1><center>';

$sql = "UPDATE rooms SET status='1' WHERE rnum=$room";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}


$sql = " INSERT INTO admit(docid,rnum,pname,page,pnic,pgen,padd,pemail,ptel,advp,date,status) 
VALUES('$doc','$room','$pname','$page','$pnic','$pgen','$padd','$pemail','$ptel','$advp','$addate',0) ";

//Execute command 2
if ($conn->query($sql) === TRUE) {

    include('../mailer/Mail.php');
    include('../mailer/mime.php');

    $toEmail = $email;
    $from = '<hos360med@gmail.com>';
    $to = '' . $toEmail . '';
    $subject = 'New Patient Admission';
    $body = "Hi,<br/><br/>You have been successfully admitted to Room No. " . $room . "<br/>Admitted date: " . $addate . "<br/>Advance Payment: " . $advp;

//    echo $body;
//    die();

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $crlf = "\r\n";
// Creating the Mime message
    $mime = new Mail_mime($crlf);

// Setting the body of the email
    $mime->setTXTBody($subject);
    $mime->setHTMLBody($body);
    $body = $mime->get();
    $headers = $mime->headers($headers);
    $smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'hos360med@gmail.com',
        'password' => '123456Med'
    ));

//    $smtp = Mail::factory('smtp', array(
//        'host' => 'ssl://smtp.dreamhost.com',
//        'port' => '465',
//        'auth' => true,
//        'username' => 'info@digicolabs.com',
//        'password' => 'digico@213'
//    ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {

        echo "<script>window.location.href='../receptionist/allp.php' ;</script>";
        die();
    }

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

	