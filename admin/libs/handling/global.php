<?php	
	
	if (session_id() == "")
		session_start();

	require_once("../classes/Database.class.php");
	require_once("../classes/Product.class.php");
	require_once("../classes/User.class.php");
	require_once("../classes/CartItems.class.php");
	require_once("../classes/Orders.class.php");
	require_once("../classes/helper.inc.php");

	Database::connect();

	if (isset($_SESSION['loggedIn'])) {
		$cuser = unserialize($_SESSION['user']);
	}

	$ORDER = new Orders();
?>