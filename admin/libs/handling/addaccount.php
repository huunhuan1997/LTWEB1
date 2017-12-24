<?php
	
	require_once("global.php");

	if (!empty($_POST['username']) &&
		!empty($_POST['email']) &&
		!empty($_POST['loaind']) &&
		!empty($_POST['hoten']) &&
		!empty($_POST['ngaysinh']) &&
		!empty($_POST['diachi']) &&
		!empty($_POST['password'])) {
 
		$username = $_POST['username'];

		if (User::checkUsernameExists($username)) {
			back();
		}

		$email = $_POST['email'];
		$loaind = $_POST['loaind'];
		$hoten = $_POST['hoten'];
		$ngaysinh = $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$password = md5($_POST['password']);

		$info = array();
		$info['username'] = "'$username'";
		$info['hoten'] = "'$hoten'";
		$info['email'] = "'$email'";
		$info['diachi'] = "'$diachi'";
		$info['ngaysinh'] = "'" . $ngaysinh . "'";
		$info['password'] = "'$password'";
		$info['loaind'] = $loaind;

		User::register($info);
	}

	redirect("/booksite/admin/index.php?p=listaccount");
?>