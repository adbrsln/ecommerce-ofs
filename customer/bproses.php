<?php
include 'include/check.php';
include '../include/db.php';
require '../include/billplz.php';
include '../include/billplz-configuration.php';

    $transid = $_GET["id"];
    $total = $_GET["t"];
    $cname = $_SESSION['coname'];
    $cemail = $_SESSION['email'];
    $caddress =$_SESSION['address'];
    $cnotel = $_SESSION['notel'];


    $a = new Billplz;
    $a->setName($cname);
    $a->setAmount($total);
    $a->setEmail($cemail);
    $a->setMobile($cnotel);
    $a->setDescription($caddress);
    $a->setPassbackURL('http://localhost/shop/customer/order.php?&id='.$transid, 'http://localhost/shop/customer/order.php?&id='.$transid);
    //$a->setReference_1('Exam apa?');
    //$a->setReference_1_Label('Apa ini');
    //$a->setPassbackURL('http://localhost/shop/customer/order.php?s=t&id='.$transid);
    $a->setCollection($collection_id);
    $a->setDeliver('1'); //Email Notification
    $a->create_bill($api_key);
    header('Location: ' .$a->getURL());

?>
