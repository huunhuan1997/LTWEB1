<?php 
    session_start();
	if(isset($_GET["a"]) && $_GET["a"] != 0 && $_GET["a"] > 10)
        $_SESSION["curURL"] = $_SERVER["REQUEST_URI"];
        
    include_once("libs/class/DataProvider.php");
    include_once("libs/class/Help.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>

<body>
<?php
    include_once("modules/mHeader.php");
    include_once("modules/mTopBar.php");
    include_once("modules/mNavigation.php");
?>
<div class="container">
    <div class="row" id="page">
        <div class="w25p pull-left">
            <?php
            include("modules/mMenuLoai.php");
            include("modules/mMenuHang.php");
            ?>
        </div>
        <div class="w72p pull-right">
            <?php
            include("modules/mContent.php");
            ?>
        </div>
    </div> 
</div>

<?php
    include("modules/mFooter.php");	
?>
</body>
</html>