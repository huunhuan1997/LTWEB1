<?php
	
	require_once("global.php");

	if (isset($cuser) ) {

		$userid = $cuser['id'];
		$orderid = Orders::create($userid);

		if ($orderid != -1) {

			$items = CartItems::select($userid);
			if (count($items) > 0) {
				foreach ($items as $item) {
					$productid = $item['product_id'];
					$quantity = $item['quantity'];
					Orders::insertItem($orderid, $productid, $quantity);
					Database::update("product", array("count" => "`product`.`count` - $quantity"), "id = $productid");
				}
				Orders::update($orderid, array('totalcost' => $_SESSION['totalcost']));
				CartItems::deleteAll($userid);
			}
		}
	}

	back();
?>