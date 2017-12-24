<?php
	
	class Product {
		
		public static function getProduct($productID) {
			$query = "SELECT * from product where id = $productID and enable = 1";
			$result = Database::first($query);
			return $result;
		}
	}
?>