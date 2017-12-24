<?php

	include_once("global.php");
	
	if (isset($cuser)) {

		$userid = $cuser['id'];
		$productid = isset($_GET['productid']) ? $_GET['productid'] : "";
		$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
		$quantity = "`cart_items`.`quantity` + " . $quantity;

		if (CartItems::exists($productid, $userid)) {
			if (CartItems::update($userid, $productid, $quantity)) {
				
				echo "Cập nhật giỏ hàng thành công";

			} else {
				
				echo "Cập nhật giỏ hàng thất bại";
			}
		} else {
			if (CartItems::insert($userid, $productid, $quantity)) {
				
				echo "Thêm hàng thành công";

			} else {
				
				echo "Thêm hàng thất bại";
			}
		}
	} else {
		
		echo "Hãy đăng nhập để sử dụng chức năng này";
	}
?>