<?php

	require_once("global.php");

	$info = array();

	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$info['username'] = "'$username'";
	}

	if (isset($_POST['password'])) {
		$password = md5($_POST['password']);
		$info['password'] = "'$password'";
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$info['email'] = "'$email'";
	}

	if (isset($_POST['hoten'])) {
		$hoten = $_POST['hoten'];
		$info['hoten'] = "'$hoten'";
	}

	if (isset($_POST['ngaysinh'])) {
		$ngaysinh = $_POST['ngaysinh'];
		$info['ngaysinh'] = "'$ngaysinh'";
	}

	if (isset($_POST['diachi'])) {
		$diachi = $_POST['diachi'];
		$info['diachi'] = "'$diachi'";
	}

	if (User::checkUsernameExists($username)) {
		redirect("/booksite/index.php?p=register&code=0");
	}

	if (User::register($info)) {
		User::login($username, $password);
	}

	redirect("/booksite/index.php?p=register&code=1");
?>