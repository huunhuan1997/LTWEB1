<?php
	
	class User {

		public static function login($username, $password) {
			$hashedPassword = md5($password);
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword' and enable = 1";
			$result = Database::first($query);

			if ($result != null) {

				$_SESSION['user'] = serialize($result);
				$_SESSION['loginTime'] = time();
				$_SESSION['loggedIn'] = 1;

				return true;
			} else {
				return false;
			}
		}

		public static function logout() {
			unset($_SESSION['user']);
			unset($_SESSION['loginTime']);
			unset($_SESSION['loggedIn']);
			session_destroy();
		}

		public static function checkUsernameExists($username) {
			$query = "SELECT id FROM users WHERE username = '$username'";
			$result = Database::first($query);
			if ($result) {
				return true;
			}
			return false;
		}

		public static function checkAccountExists($username, $password) {
			$query = "SELECT top 1 1 FROM users WHERE username = '$username' and password = '$password'";
			$result = Database::first($query);

			if (!$result) {
				return false;
			} else {
				return true;
			}
		}

		public static function register($info) {
			$columns = "";
			$values = "";
			foreach ($info as $col => $val) {
				$columns .= $columns == "" ? "" : ", ";
				$columns .= "`$col`";
				$values .= $values == "" ? "" : ", ";
				$values .= "$val";
			}

			$query = "INSERT INTO users ($columns) VALUES ($values)";
			$result = Database::executeNonQuery($query);

			return Database::lastInsertID();
		}
	}
?>