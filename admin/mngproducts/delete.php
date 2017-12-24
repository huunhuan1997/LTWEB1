<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * from `product` where id = $id";
		$product = Database::first($query);
		if ($product['enable'] == 1)
			$enable = 0;
		else
			$enable = 1;
		Database::update("product", array("enable" => $enable), "id = $id");
	}
	redirect("?p=listproduct");
?>