<?php
	
	include_once("global.php");

	if (!empty($_GET['id'])) {

		$id = $_GET['id'];
		$info = array();

		if (!empty($_POST['name'])) {
			$buf = $_POST['name'];
			$info['name'] = "'$buf'";
		}

		if (!empty($_POST['author'])) {
			$buf = $_POST['author'];
			$info['author'] = "'$buf'";
		}

		if (!empty($_POST['category'])) {
			$buf = $_POST['category'];
			$info['category'] = $buf;
		}

		if (!empty($_POST['publisher'])) {
			$buf = $_POST['publisher'];
			$info['publisher'] = $buf;
		}

		if (!empty($_POST['price'])) {
			$buf = $_POST['price'];
			$info['price'] = $buf;
		}

		if (!empty($_POST['count'])) {
			$buf = $_POST['count'];
			$info['count'] = $buf;
		}

		if (!empty($_POST['description'])) {
			$buf = $_POST['description'];
			$info['description'] = "'$buf'";
		}

		if (!empty($_FILES['img']['name']) && $_FILES['img']['error'] == 0) {
			$imgext = substr($_FILES['img']['name'], strpos($_FILES['img']['name'], '.') + 1);
			$imgext = strtolower($imgext);
			$img = $id . "." . $imgext;
			$info['img'] = "'$img'";
		}
		
		if (Database::update("product", $info, "id = $id")) {
			move_uploaded_file($_FILES['img']['tmp_name'], "../../../imgs/product/" . $img);
		}

		redirect("/booksite/admin/index.php?p=listproduct");

	} else {
		echo "Có lỗi xảy ra, vui lòng kiểm tra lại";
	}
?>