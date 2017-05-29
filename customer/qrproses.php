<?php
include '../include/db.php';
$tid = $_GET['t'];
//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';
include "include/phpqrcode/qrlib.php";

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR.'.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    $errorCorrectionLevel = $_REQUEST['level'];

$matrixPointSize = 4;
if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


if (isset($_REQUEST['data'])) {

    //it's very important!
    if (trim($_REQUEST['data']) == '')
        die('data cannot be empty! <a href="?">back</a>');

    // user data
    $billid = $_REQUEST['data'];
    $filename = $PNG_TEMP_DIR.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    QRcode::png('https://billplz-staging.herokuapp.com/bills/'.$_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    $filen =$PNG_WEB_DIR.basename($filename);

    $query2 ="INSERT INTO bill (qrimg,billCode) values ('$filen','$billid')";
    mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
    $query3 ="SELECT billNum FROM bill ORDER BY billNum DESC LIMIT 1";
      $res = mysqli_query($connect,$query3);
    while($row2 = mysqli_fetch_assoc($res)){  $bnu =$row2['billNum']; }
    $sql4 = "Update corder set billID = '$bnu' ,status = '4' where transactionid = '$tid'";
    mysqli_query($connect,$sql4);
} else {

    //default data
    echo 'You can provide data in GET parameter: <a href="?data=www.google.com">like that</a><hr/>';
    //QRcode::png('https://billplz-staging.herokuapp.com/bills/'.$billid, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

}
echo "<script>window.location = 'order.php?s=t&id=$tid';</script>";
?>
