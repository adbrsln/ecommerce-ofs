<?php
include 'include/check.php';
include '../include/db.php';
include '../include/db.php';
require '../billplz.php';


    $transid = $_GET["id"];
    $total = $_GET["t"];
    $cname = $_SESSION['coname'];
    $cemail = $_SESSION['email'];
    $caddress =$_SESSION['address'];
    $cnotel = $_SESSION['notel'];

    $api_key = '4b8d57f7-46c8-40da-b13f-1abe19477a43';

    $a = new Billplz;
    $a->setName($cname);
    $a->setAmount($total);
    $a->setEmail($cemail);
    $a->setMobile($cnotel);
    $a->setDescription($caddress);
    $a->setPassbackURL('http://localhost/shop/customer/order.php?s=t&id='.$transid, 'http://localhost/shop/customer/order.php?s=t&id='.$transid);
    $a->setReference_1('Exam apa?');
    $a->setReference_1_Label('Apa ini');
    //$a->setPassbackURL('http://localhost/shop/customer/order.php?s=t&id='.$transid);
    $a->setCollection('rfdv2rbv');
    $a->setDeliver('1'); //Email Notification
    $a->create_bill($api_key);
    header('Location: ' .$a->getURL());

?>
