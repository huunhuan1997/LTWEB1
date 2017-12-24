<?php
	
	require_once("global.php");

	if (!empty($_POST['name']) &&
		!empty($_POST['author']) &&
		!empty($_POST['category']) &&
		!empty($_POST['publisher']) &&
		!empty($_POST['price']) &&
		!empty($_POST['description']) &&
		!empty($_POST['count']) &&
		!empty($_FILES['img']['name'])) {

		$name = $_POST['name'];
 
		if (Database::first("select 1 from product where name = '$name'") || $_FILES['img']['error'] != 0) {
			back();
		}

		$author = $_POST['author'];
		$category = $_POST['category'];
		$publisher = $_POST['publisher'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$count = $_POST['count'];

		$info = array();
		$info['name'] = "'$name'";
		$info['author'] = "'$author'";
		$info['category'] = $category;
		$info['publisher'] = $publisher;
		$info['description'] = "'$description'";
		$info['price'] = $price;
		$info['count'] = $count;

		$id = Database::insert("product", $info);

		$imgext = substr($_FILES['img']['name'], strpos($_FILES['img']['name'], '.') + 1);
		$imgext = strtolower($imgext);
		$img = $id . "." . $imgext;
		move_uploaded_file($_FILES['img']['tmp_name'], "../../../imgs/product/" . $img);

		Database::update("product", array("img" => "'$img'"), "id = $id");
	}

	redirect("/booksite/admin/index.php?p=listproduct");
?>