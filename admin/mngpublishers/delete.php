<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * from `publisher` where id = $id";
		$pls = Database::first($query);
		if ($pls['enable'] == 1)
			$enable = 0;
		else
			$enable = 1;
		Database::update("publisher", array("enable" => $enable), "id = $id");
	}
	redirect("?p=listpublisher");
?>