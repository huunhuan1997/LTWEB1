<?php
	
	require_once("global.php");

	if (!empty($_POST['user_id']) &&
		!empty($_POST['totalcost']) &&
		!empty($_POST['status'])) {
 
		$userid = $_POST['user_id'];
		$orderid = Orders::create($userid);

		if ($orderid != -1) {

			$totalcost = $_POST['totalcost'];
			$status = $_POST['status'];
			Orders::update($orderid, array('totalcost' => $totalcost, 'status' => $status));
		}
	}

	redirect("/booksite/admin/index.php?p=listorder");
?>