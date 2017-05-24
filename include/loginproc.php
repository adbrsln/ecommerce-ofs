<?php
session_start();
include 'db.php';

// Retrieve username and password from database according to user's input
$username=mysqli_real_escape_string($connect,$_POST['username']);
$password=mysqli_real_escape_string($connect,$_POST['password']);
$encrypted_mypassword=md5($password);
$sql = "SELECT * FROM details WHERE (username = '$username') and (password = '$encrypted_mypassword')";
$login = mysqli_query($connect,$sql);
$count = mysqli_num_rows($login) ;


// Check username and password match

 while($row = mysqli_fetch_assoc($login)){
					$_SESSION['usernamela'] = $username;

					$_SESSION['levella'] = $row['level'];
					

					$_SESSION['coname'] = $row['name'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['cnum'] = $row['num'];
					$_SESSION['notel'] = $row['notel'];
          $_SESSION['email'] = $row['email'];


					$type = $_SESSION['levella'];
				}

 if ($count != "") {
           switch ($type) {
				case 1:

					header('Location: ../admin'); // admin Level;
					break;
				case 2:


					header('Location: ../staff/index.php');
					break;
				case 3:


					header('Location: ../customer/index.php');
					break;

			}



}
else {

header('Location:../main.php?s=lf');

}




?>
