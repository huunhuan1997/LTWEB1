<?php
	
	include_once("global.php");

	if (!empty($_GET['id'])) {

		$id = $_GET['id'];
		$info = array();

		if (!empty($_POST['username'])) {
			$buf = $_POST['username'];
			$info['username'] = "'$buf'";
		}

		if (!empty($_POST['email'])) {
			$buf = $_POST['email'];
			$info['email'] = "'$buf'";
		}

		if (!empty($_POST['loaind'])) {
			$buf = $_POST['loaind'];
			$info['loaind'] = "$buf";
		}

		if (!empty($_POST['hoten'])) {
			$buf = $_POST['hoten'];
			$info['hoten'] = "'$buf'";
		}

		if (!empty($_POST['ngaysinh'])) {
			$buf = $_POST['ngaysinh'];
			$info['ngaysinh'] = "'$buf'";
		}

		if (!empty($_POST['diachi'])) {
			$buf = $_POST['diachi'];
			$info['diachi'] = "'$buf'";
		}
		
		Database::update("users", $info, "id = $id");
		redirect("/booksite/admin/index.php?p=listaccount");

	} else {
		echo "Có lỗi xảy ra, vui lòng kiểm tra lại";
	}
?>