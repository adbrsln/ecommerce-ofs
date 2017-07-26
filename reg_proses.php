
<?php
include 'include/db.php';


$n = ucwords(strtolower($_POST['nama']));
$u = strtolower($_POST['user']);
$p = $_POST['pass'];
$l = $_POST['level'];
$e = $_POST['email'];
$add = $_POST['address'];
$notel = $_POST['notel'];

$query="SELECT * FROM details WHERE username = '$u'";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);

if($num != 0)
{
		echo "this username has been taken! try again!";
		echo '<script>window.history.go(-1);</script>';

}
else
		{
		$encrypted_mypassword = md5($p);
		
		$query = "INSERT INTO details (name,email,address,notel,username,password,level) VALUES ('$n','$e','$add','$notel','$u','$encrypted_mypassword','$l')";
		mysqli_query($connect,$query) or die ("Error Query");
		$query = "FLUSH PRIVILEGES";

		echo '<meta http-equiv="refresh" content="0;url=main.php?s=llt">';
    }
?>
