<?php
	
	require_once("global.php");

	if (!empty($_POST['name']) &&
		isset($_POST['description'])) {

		$name = $_POST['name'];
		$description = $_POST['description'];

		if (Database::first("select 1 from category where name = '$name'")) {
			back();
		}

		Database::insert("category", array('name' => "'$name'", 'description' => "'$description'"));
	}

	redirect("/booksite/admin/index.php?p=listcate");
?>