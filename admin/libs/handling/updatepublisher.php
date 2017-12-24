<?php
	
	include_once("global.php");

	if (!empty($_GET['id'])) {

		$id = $_GET['id'];
		$info = array();

		if (!empty($_POST['name'])) {
			$buf = $_POST['name'];
			$info['name'] = "'$buf'";
		}

		if (!empty($_POST['number'])) {
			$buf = $_POST['number'];
			$info['number'] = "'$buf'";
		}

		if (!empty($_POST['address'])) {
			$buf = $_POST['address'];
			$info['address'] = "'$buf'";
		}

		Database::update("publisher", $info, "id = $id");
		redirect("/booksite/admin/index.php?p=listpublisher");
		
	} else {
		echo "Có lỗi xảy ra, vui lòng kiểm tra lại";
	}
?>

