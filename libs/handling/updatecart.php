<?php
	
	include_once("global.php");

	if (isset($_GET['action'])) {
		$userid = isset($cuser['id']) ? $cuser['id'] : "";
		$productid = isset($_GET['productid']) ? $_GET['productid'] : "";

		if ($_GET['action'] == "update") {
			if (!empty($_GET['quantity']) && is_numeric($_GET['quantity']) && $_GET['quantity'] > 0) {
				$quantity = $_GET['quantity'];
				$count = Product::getProduct($productid)['count'];
				if ($quantity <= $count) {
					CartItems::update($userid, $productid, $quantity);
				}
			}
		} else if ($_GET['action'] == "delete") {
			CartItems::deleteItem($userid, $productid);
		}
	}

	back();
?>

