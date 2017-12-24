<?php

	include_once("global.php");

	if (!empty($_GET['id'])) {

		$id = $_GET['id'];
		$info = array();

		if (!empty($_POST['name'])) {
			$buf = $_POST['name'];
			$info['name'] = "'$buf'";
		}

		if (!empty($_POST['description'])) {
			$buf = $_POST['description'];
			$info['description'] = "'$buf'";
		}

		Database::update("category", $info, "id = $id");
		redirect("/booksite/admin/index.php?p=listcate");

	} else {
		echo "Có lỗi xảy ra, vui lòng kiểm tra lại";
	}
?>