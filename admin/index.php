<?php 
    session_start();
        
    include_once("libs/class/DataProvider.php");
    include_once("libs/class/Help.php");
    include_once("libs/class/ShoppingCard.php");
    include_once("libs/class/TaiKhoan.php");
    include_once("libs/class/DatHang.php");

    if (!isset($_SESSION['MaTaiKhoan']) || $_SESSION['MaLoaiTaiKhoan'] != 2) {
		Provider::changeURL('Error.php');
	} else {
		$MaTaiKhoan = $_SESSION['MaTaiKhoan'];
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php include_once("modules/mHeader.php"); ?>
<title></title>
</head>

<body>
<?php
    include_once("modules/mTopBar.php");
    include_once("modules/mNavigation.php");
?>
<div class="container">
	<div class="w100p" id="page"> 
		<div> 
            <?php include('modules/mContent.php');?>
		</div> 
	</div> 
</div>
</body>
</html>