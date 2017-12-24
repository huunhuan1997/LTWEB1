<?php

	class Orders {

		public static function create($userid) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d H:i:s");
			$query = "INSERT INTO `orders` (`user_id`, `created`) values ($userid, '$date')";
			$result = Database::executeNonQuery($query);
			if ($result) {
				$_SESSION['totalcost'] = 0;
				return Database::lastInsertID();
			}
			return -1;
		}

		public static function update($id, $info) {
			$str = "";
			foreach ($info as $col => $val) {
				$str .= ($str == "") ? "" : ", ";
				$str .= $col . " = " . $val;
			}
			$query = "UPDATE `orders` set $str where `id` = $id";
			return Database::executeNonQuery($query);
		}

		public static function disable($id) {
			$query = "UPDATE `orders` set `enable` = 0 where id = $id";
			return Database::executeNonQuery($query);
		}

		public static function insertItem($orderid, $productid, $quantity) {
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$date = date("Y-m-d H:i:s");
			$totalcost = Product::getProduct($productid)['price']*$quantity;
			$query = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `totalcost`, `created`) values ($orderid, $productid, $quantity, $totalcost, '$date')";
			$result = Database::executeNonQuery($query);
			if ($result) {
				if (isset($_SESSION['totalcost'])) {
					$_SESSION['totalcost'] += $totalcost;
				} else {
					$_SESSION['totalcost'] = $totalcost;
				}
			}
		}

		public function deleteItem($productid, $orderid) {
			$query = "DELETE from `order_items` where `product_id` = $productid and `order_id` = $orderid";
			$result = Database::executeNonQuery($query);
			return $result;
		}

		public function updateItem($productid, $quantity) {
			$product = new Product();
			$totalcost = $product->getProduct($productid)['price']*$quantity;
			$query = "UPDATE `order_items` where `product_id` = $productid, `quantity` = $quantity, `totalcost` = $totalcost where `product_id` = $productid and `order_id` = $orderid";
			$db = new Database();
			$result = $db->executeNonQuery($query);
			return $result;
		}

		public function countItem() {
			$query = "SELECT (*) from `order_items` where `order_id` = $this->id";
			$db = new Database();
			$result = $db->first($query);
			if ($result) {
				return $result[0];
			} else {
				return -1;
			}
		}

		public function totalCost() {
			
		}
	}
?>