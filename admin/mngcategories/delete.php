<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * from `category` where id = $id";
		$cate = Database::first($query);
		if ($cate['enable'] == 1)
			$enable = 0;
		else
			$enable = 1;
		Database::update("category", array("enable" => $enable), "id = $id");
	}
	redirect("?p=listcate");
?>