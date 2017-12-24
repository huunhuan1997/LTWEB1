<?php
	
	session_start();

	require_once("libs/classes/Database.class.php");
	require_once("libs/classes/Product.class.php");
	require_once("libs/classes/User.class.php");
	require_once("libs/classes/CartItems.class.php");
	require_once("libs/classes/Orders.class.php");
	require_once("libs/classes/helper.inc.php");

	Database::connect();

	if (isset($_SESSION['loggedIn'])) {
		$cuser = unserialize($_SESSION['user']);
	}

	include_once("modules/header.php");
	include_once("modules/topbar.php");
	include_once("modules/navigation.php");
	include_once("modules/slider.php");
?>

<div class="container">
	<div class="row" id="page"> <!-- body content wrapper -->
		<div class="w25p pull-left">
			<?php
			include_once("modules/categories.php");
			include_once("modules/publishers.php");
			?>
		</div>
		<div class="w72p pull-right">


<!-- ============ CONTENTS =============== -->


<?php
	if (!isset($_GET['p'])) {
		include_once("pages/home.php");
	} else {
		$p = $_GET['p'];
		switch ($p) {
			case 'register':
				include_once("pages/register.php");
				break;
				break;
			case 'products':
				include_once("pages/products.php");
				break;
			case 'productdetail':
				include_once("pages/productdetail.php");
				break;
			case 'cart':
				include_once("pages/cart.php");
				break;
			case 'history':
				include_once("pages/history.php");
				break;
			case 'cart':
				include_once("pages/cart.php");
				break;
			default:
				include_once("pages/error.php");
				break;
		}
	}
?>


<!-- ============ END OF CONTENTS =============== -->

		</div>
	</div> <!-- body content wrapper -->
</div>

<?php
	// footer
	include("modules/footer.php");	
?>