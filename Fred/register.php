<?php
include 'db_connection.php';

$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$name = $obj['name'];
$email = $obj['email'];
$password = $obj['password'];

$sql = "SELECT * FROM `users` WHERE email = '$email'";
$query = mysqli_query($conn, $sql);
$check = mysqli_num_rows($query);
if ($check == 1) {
	echo json_encode('E-mail already exist');
}
else{
	$sql = "INSERT INTO `users` SET id = '', name = '$name', email = '$email', password = '$password'";
	$query = mysqli_query($conn, $sql);
	if ($query = 1) {
		echo json_encode('User Registered Successfully');
	}
	else{
		echo json_encode('Try Again');
	}
}
?>
