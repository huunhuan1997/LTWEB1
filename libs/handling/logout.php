<?php
	
	require_once("global.php");

	if (isset($_SESSION['loggedIn'])) {
		User::logout();
	}
?>