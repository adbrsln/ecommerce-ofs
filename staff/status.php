<?php
include 'include/check.php';
include '../include/db.php';
if (isset( $_GET['id']) &&isset($_GET['type'])  ){
	$id = $_GET['id'];
	$type = $_GET['type'];
	$masatarikh = date('Y-m-d H:i:s');
	$query="SELECT * FROM corder WHERE transactionid = '$id'";
	$result=mysqli_query($connect,$query);
	$num=mysqli_num_rows($result);
	if ($num > 0) {
		if ($type == 'Approve'){
			$query2 = "UPDATE corder set status = '1' where transactionid = '$id'";

			mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
			$querydaftar = "FLUSH PRIVILEGES";

			 echo '<meta http-equiv="refresh" content="0;url=../staff/index.php">';

		}elseif ($type == 'complete') {
			$query2 = "UPDATE corder set status = '2' where transactionid = '$id'";

			mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
			$querydaftar = "FLUSH PRIVILEGES";

			 echo '<meta http-equiv="refresh" content="0;url=../staff/index.php">';

		}	else {
			$query2 = "UPDATE corder set status = '5' where transactionid = '$id'";

				mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
				$querydaftar = "FLUSH PRIVILEGES";

				 echo '<meta http-equiv="refresh" content="0;url=../staff/index.php">';
		}

}
}elseif (isset ($_POST['type2'])){
		$type2 =$_POST['type2'] ;
		$id = $_POST['id'];
		$posid = $_POST['posid'];
		$query2 = "UPDATE corder set status = '6' where transactionid = '$id'";
		mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
		$query2 = "FLUSH PRIVILEGES";
		$query2 = "INSERT INTO pos (transid,posid) values ('$id','$posid') ";
		mysqli_query($connect,$query2) or die('Error: ' . mysqli_error());
		$query2 = "FLUSH PRIVILEGES";

		 echo '<meta http-equiv="refresh" content="0;url=../staff/index.php">';


	}
else{

//echo '<script>window.history.go(-1);</script>';
}

?>
