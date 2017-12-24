<?php
	
	require_once("global.php");

	if (!empty($_POST['name']) &&
		isset($_POST['number']) &&
		isset($_POST['address'])) {

		$name = $_POST['name'];
		$number = $_POST['number'];
		$address = $_POST['address'];

		Database::insert("publisher", array('name' => "'$name'", 'number' => "'$number'", 'address' => "'$address'"));
	}

	redirect("/booksite/admin/index.php?p=listpublisher");
?>