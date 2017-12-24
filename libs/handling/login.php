<?php
	
	require_once("global.php");

	if (isset($_POST['username']) && isset($_POST['password'])) {
echo "hello";
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (User::login($username, $password)) {
			echo "1";
		} else {
			echo "0";
		}
	}
?>