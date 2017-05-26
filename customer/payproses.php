<?php

include '../include/db.php';

if(isset($_GET["id"])){
	$tid = $_GET["id"];
	$type = $_GET["type"];
	$status = $_GET["status"];
}
else {
	$i = $_POST['img'];
	$tid = $_POST['tid'];
}
$masatarikh = date('Y-m-d H:i:s');

$query="SELECT * FROM corder WHERE transactionid = '$tid' ";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);
if ($num > 0) {
	if ( isset($type)){
		$query2 = "UPDATE corder set  status = '5' where transactionid = '$tid'";

		mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
		$querydaftar = "FLUSH PRIVILEGES";

		 echo '<meta http-equiv="refresh" content="0;url=./customer/index.php">';
		 echo "<script>alert('Order is cancel!')</script>";
	}
	else {
		$query2 = "UPDATE corder set imglink = '$i' , tmpayment = '$masatarikh' , status = '3' where transactionid = '$tid'";

		mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
		$querydaftar = "FLUSH PRIVILEGES";

		 echo '<meta http-equiv="refresh" content="0;url=./customer/index.php">';
		  echo "<script>alert('Order is waiting to be confirmed by our staff!')</script>";
	}

}


else{

 //echo '<meta http-equiv="refresh" content="0;url=/userid/pages/pengguna.php?success=false">';
echo '<script>window.history.go(-2);</script>';

}

?>
