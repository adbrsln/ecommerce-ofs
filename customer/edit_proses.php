
<?php
include 'include/check.php';
include '../include/db.php';


$id = $_POST['id'];
$n = $_POST['nama'];
$a = $_POST['address'];
$no = $_POST['notel'];
$email = $_POST['email'];




$query="SELECT * FROM details WHERE num = '$id'";
$result=mysqli_query($connect,$query);
$num=mysqli_num_rows($result);

if($num != 0)
{

			$query = "UPDATE details set name = '$n' , address = '$a' , notel = '$no', email='$email' where num = $id";
		mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");
		$query = "FLUSH PRIVILEGES";
		echo '<meta http-equiv="refresh" content="0;url=index.php?s=t">';

}
else
		{


		echo '<meta http-equiv="refresh" content="0;url=index.php?s=true">';

		}



?>
