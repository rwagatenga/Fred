<?php
$conn =  new mysqli('localhost', 'root', '', 'fred');
if (!$conn) {
	echo "Connection Failed";
}
?>