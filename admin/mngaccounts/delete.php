<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * from `users` where id = $id";
		$user = Database::first($query);
		if ($user['enable'] == 1)
			$enable = 0;
		else
			$enable = 1;
		Database::update("users", array("enable" => $enable), "id = $id");
	}
	redirect("?p=listaccount");
?>