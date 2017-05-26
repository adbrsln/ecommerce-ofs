<?php  session_start();
 //error_reporting(0);
include 'include/db.php';
require 'billplz.php';
$transid=session_id();
    if(isset($_SESSION['cart']) && isset($_SESSION['cnum'])){
        $totaldiscount = $_POST["totaldiscount"];
        $discount = $_POST["discount"];
        $pos = $_POST["pos"];
        $ftotal = $_POST["ftotal"];
        $uid = $_POST["uid"];

        $sql="SELECT * FROM item WHERE num IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY itemName ASC";
        $query=mysqli_query($connect,$sql);



        while($row=mysqli_fetch_array($query)){

            $price = $_SESSION['cart'][$row['num']]['price'];
            $qty = $_SESSION['cart'][$row['num']]['qty'];
            $itemname =  $row['itemName'];
            $total =  $price * $qty;
            $itemid = $row['num'];

           $query2 = "INSERT INTO corder (transactionid,item_id,user_id,qty,total,ftotal,discount,pos,tdisc,status) VALUES ('$transid','$itemid','$uid','$qty','$total','$ftotal','$discount','$pos','$totaldiscount','1')";
            mysqli_query($connect,$query2) or die ("Error Query [".$strSQL."]");

            $cname = $_SESSION['coname'];
            $cemail = $_SESSION['email'];
            $caddress =$_SESSION['address'];
            $cnotel = $_SESSION['notel'];

        }



      echo '<script>window.location = "customer/index.php";</script>';
        unset($_SESSION['cart']);
          session_regenerate_id(true);
    }else{
        //if($_SESSION['cnum'] == ''){
            //echo "<script>alert('Please login First to continue!');</script>";
            echo '<script>window.location = "./main.php?s=sf";</script>';
        //}else{
      //  echo "<p>Your Cart is empty. Please add some products.</p>";
         // }
    }

?>
