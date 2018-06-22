<?php
include 'db_connection.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$email = $obj['email'];
$password = $obj['password'];

$sql = "SELECT * FROM `users` WHERE email = '$email' and password = '$password'";
$query = mysqli_query($conn, $sql);
if ($query) {
	if (mysqli_num_rows($query)>0) {
		while ($data = mysqli_fetch_array($query)) {
			$_SESSION['logged_id']=$data['id'];
		}
		$_SESSION['logged']=1;
		echo json_encode('Ok');
	}
	else {
		echo json_encode('Invalid E-mail or Password');
	}
}
else {
	echo json_encode('Try Again');
}
?>
