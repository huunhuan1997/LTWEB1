<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		Database::update("orders", array("status" => 4), "id = $id");
	}
	redirect("?p=listorder");
?>