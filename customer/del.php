<?php
include 'include/check.php';
include '../include/db.php';
$num = $_GET['id'];

$query = "DELETE FROM corder WHERE transactionid = '$num'";


mysqli_query($connect,$query) or die('Delete record failed');
$query = "FLUSH PRIVILEGES";
echo '<meta http-equiv="refresh" content="0;url=./index.php?s=p">'; 
//include 'files/closedb.php';

?>
