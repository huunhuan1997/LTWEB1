<?php

	require_once("libs/classes/Database.class.php");
	require_once("libs/classes/User.class.php");
	require_once("libs/classes/Product.class.php");
	require_once("libs/classes/CartItems.class.php");
	require_once("libs/classes/helper.inc.php");

	session_start();

	//if (!isset($_SESSION['loggedIn']) || unserialize($_SESSION['user'])['loaind'] != 3) {
	//	redirect("error.php");
	//} else {
	//	$cuser = unserialize($_SESSION['user']);
	//}

	Database::connect();

	include_once("modules/header.php");
	include_once("modules/topbar.php");
	include_once("modules/navigation.php");
?>

<div class="container">
	<div class="w100p" id="page"> <!-- body content wrapper -->
		<div> <!-- right column wrapper -->


<!-- ============ CONTENTS =============== -->


<?php
	if (!isset($_GET['p'])) {
		
	} else {
		$p = $_GET['p'];
		switch ($p) {
			case 'error':
				include_once("pages/error.php");
				break;
			case 'listorder':
				include_once("mngorders/list.php");
				break;
			case 'addorder':
				include_once("mngorders/add.php");
				break;
			case 'deleteorder':
				include_once("mngorders/delete.php");
				break;
			case 'editorder':
				include_once("mngorders/edit.php");
				break;
			case 'listcate':
				include_once("mngcategories/list.php");
				break;
			case 'addcate':
				include_once("mngcategories/add.php");
				break;
			case 'deletecate':
				include_once("mngcategories/delete.php");
				break;
			case 'editcate':
				include_once("mngcategories/edit.php");
				break;
			case 'listproduct':
				include_once("mngproducts/list.php");
				break;
			case 'addproduct':
				include_once("mngproducts/add.php");
				break;
			case 'deleteproduct':
				include_once("mngproducts/delete.php");
				break;
			case 'editproduct':
				include_once("mngproducts/edit.php");
				break;
			case 'listpublisher':
				include_once("mngpublishers/list.php");
				break;
			case 'addpublisher':
				include_once("mngpublishers/add.php");
				break;
			case 'deletepublisher':
				include_once("mngpublishers/delete.php");
				break;
			case 'editpublisher':
				include_once("mngpublishers/edit.php");
				break;
			case 'listaccount':
				include_once("mngaccounts/list.php");
				break;
			case 'addaccount':
				include_once("mngaccounts/add.php");
				break;
			case 'deleteaccount':
				include_once("mngaccounts/delete.php");
				break;
			case 'editaccount':
				include_once("mngaccounts/edit.php");
				break;
			default:
				include_once("pages/error.php");
				break;
		}
	}
?>


<!-- ============ END OF CONTENTS =============== -->


		</div> <!-- right column wrapper -->
	</div> <!-- body content wrapper -->
</div>

<?php
	// footer
	include("modules/footer.php");	
?>