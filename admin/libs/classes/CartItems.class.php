<?php

	class CartItems {

		public static function select($userid) {
			$query = "SELECT * from `cart_items` WHERE `user_id` = $userid";
			$result = Database::executeQuery($query);
			return $result;
		}

		public static function count($userid) {

			$query = "SELECT count(*) from `cart_items` WHERE `user_id` = $userid";
			$result = Database::first($query);
			return $result[0] == null ? 0 : $result[0];
		}

		public static function exists($productid, $userid) {
			$query = "SELECT count(*) from `cart_items` where `product_id` = $productid and `user_id` = $userid";
			$result = Database::first($query);
			if ($result) {
				if ($result[0] > 0)
					return true;
			}
			return false;
		}

		public static function insert($userid, $productid, $quantity) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$created = date("Y-m-d H:i:s");
			$query = "INSERT INTO `cart_items` (`user_id`, `product_id`, `quantity`, `created`) values ($userid, $productid, $quantity, '$created')";
			$result = Database::executeNonQuery($query);
			if ($result) {
				return true;
			} else
				return false;
		}

		public static function update($userid, $productid, $quantity) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$created = date('Y-m-d');
			$query = "UPDATE `cart_items` SET `quantity` = $quantity, `created` = '$created' WHERE `user_id` = $userid and `product_id` = $productid";
			$result = Database::executeNonQuery($query);
			if ($result) {
				return true;
			} else
				return false;
		}

		public static function deleteItem($userid, $productid) {
			$query = "DELETE from `cart_items` WHERE `user_id` = $userid and `product_id` = $productid";
			return Database::executeNonQuery($query);
		}

		public static function deleteAll($userid) {
			$query = "DELETE from `cart_items` WHERE `user_id` = $userid";
			return Database::executeNonQuery($query);
		}
	}
?>