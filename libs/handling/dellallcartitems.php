<?php
	
	include_once("global.php");

	$userid = isset($cuser['id']) ? $cuser['id'] : "";
	CartItems::deleteAll($userid);

	back();
?>

