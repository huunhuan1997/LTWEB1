<?php
	
	include_once("global.php");

	if (!empty($_GET['id'])) {

		$id = $_GET['id'];
		$info = array();

		if (!empty($_POST['user_id'])) {
			$buf = $_POST['user_id'];
			$info['user_id'] = "$buf";
		}

		if (!empty($_POST['totalcost'])) {
			$buf = $_POST['totalcost'];
			$info['totalcost'] = "$buf";
		}

		if (!empty($_POST['created'])) {
			$buf = $_POST['created'];
			$info['created'] = "'$buf'";
		}

		if (!empty($_POST['status'])) {
			$buf = $_POST['status'];
			$info['status'] = "'$buf'";
		}

		Database::update("orders", $info, "id = $id");
		redirect("/booksite/admin/index.php?p=listorder");
		
	} else {
		echo "Có lỗi xảy ra, vui lòng kiểm tra lại";
	}
?>

