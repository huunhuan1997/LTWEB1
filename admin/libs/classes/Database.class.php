<?php

	class Database {
		
		public static $name = "bookstore";
		public static $user = "root";
		public static $pass = "huunhuan";
		public static $host = "localhost";
		public static $conn;

		public static function connect() {
			$conn = mysqli_connect(self::$host, self::$user, self::$pass,self::$name);
			mysqli_query($conn,"SET NAMES 'UTF8'");

			return $conn;
		}

		public static function parseRowSet($rowSet) {
			$resultArray = array();			
			if ($rowSet) {
				while ($row = mysqli_fetch_array($rowSet)) {
					array_push($resultArray, $row);
				}
			}
			return $resultArray;			
		}

		public static function countRow($query) {
			$result = mysqli_query($query);
			return count(self::parseRowSet($result));
		}

		public static function executeQuery($query) {
			$result = mysqli_query($query);
			return self::parseRowSet($result);
		}

		public static function executeNonQuery($query) {
			return mysqli_query($query);
		}

		public static function first($query) {
			$result = mysqli_query($query);
			if ($result) {
				return mysqli_fetch_array($result);
			}
			return false;
		}

		public static function lastInsertID() {
			$query = "select last_insert_id()";
			return self::first($query)[0];
		}

		public static function update($table, $info, $where) {
			$str = "";
			foreach ($info as $col => $val) {
				$str .= ($str == "") ? "" : ", ";
				$str .= $col . " = " . $val;
			}
			$query = "UPDATE `$table` set $str where $where";
			return self::executeNonQuery($query);
		}

		public static function delete($table, $where) {
			$query = "DELETE FROM `$table` WHERE $where";
			return self::executeNonQuery($query);
		}

		public static function disable($table, $where) {
			$query = "UPDATE `$table` set `enable` = 0 where $where";
			return self::executeNonQuery($query);
		}

		public static function insert($tableName, $info) {
			$columns = "";
			$values = "";
			foreach ($info as $col => $val) {
				$columns .= ($columns == "") ? "" : ", ";
				$columns .= "`$col`";
				$values .= ($values == "") ? "" : ", ";
				$values .= $val;
			}

			$query = "INSERT INTO `$tableName` ($columns) VALUES ($values)";
			if (self::executeNonQuery($query))
				return self::lastInsertID();
			else
				return false;
		}
	}
?>