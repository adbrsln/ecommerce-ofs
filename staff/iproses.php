<?php include 'include/check.php';
include '../include/db.php';


$n = $_POST['itemname'];
$p = $_POST['itemprice'];
$d = $_POST['desc'];
$c = $_POST['category'];
if(isset($_POST["id"])){
  $i = $_POST["id"];
  $img = $_POST['img'];

    $query = "UPDATE item set itemName = '$n' , itemPrice = '$p' , itemDesc = '$d' , categ = '$c', imglink='$img' where num = $i";
    mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");;
    $query = "FLUSH PRIVILEGES";
    //echo '<meta http-equiv="refresh" content="0;url=../staff/item.php?s=it">';
}
else
    {

    $query = "INSERT INTO item (itemName,itemPrice,itemDesc,categ) VALUES ('$n', '$p', '$d', '$c')";
    mysqli_query($connect,$query) or die ("Error Query [".$strSQL."]");;
    $query = "FLUSH PRIVILEGES";


    //echo '<meta http-equiv="refresh" content="0;url=../staff/item.php?s=it">';

    }



?>
