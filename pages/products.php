<?php changeTitle("Danh sách sản phẩm"); ?>

<div class="w100p clearfix"> <!-- products wrapper -->

<?php

	$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
	$countPerPage = 12;
	$recordOffset = $countPerPage * ($currentPage - 1); 

	$table = array();
	$where = array();
	$select = "pd.id, pd.name, pd.author, pd.price, pd.img";
	
	$table[] = "product pd";
	$where[] = "pd.enable = 1";

	$table[] = "category g";
	$where[] = "g.enable = 1 and g.id = pd.category";

	$table[] = "publisher pls";
	$where[] = "pls.enable = 1 and pls.id = pd.publisher";


	if (!empty($_GET['cate'])) {
		$cate = $_GET['cate'];
		if ($cate == 'moi') {
			$where[] = "pd.timestamp - now() < 1440000";
		}
		else if ($cate == 'hot') {
			$table[] = "order_items oi";
			$where[] = "oi.product_id = pd.id GROUP BY pd.id ORDER BY count(*) DESC";
		}
		else if (is_numeric($cate)) {
			$where[] = "g.id = $cate";
		}
	}

	if (!empty($_GET['pls'])) {
		$pls = $_GET['pls'];
		$where[] = "pls.id = $pls";
	}

	if (!empty($_GET['priceMax']) && !empty($_GET['priceMin'])) {
		$priceMax = $_GET['priceMax'];
		$priceMin = $_GET['priceMin'];
		$where[] = "pd.price >= $priceMin and pd.price <= $priceMax";
	}

	if (!empty($_GET['author'])) {
		$author = $_GET['author'];
		$where[] = "pd.author like '%$author%'";
	}

	if (!empty($_GET['name'])) {
		$name = $_GET['name'];
		$where[] = "pd.name like '%$name%'";
	}

	$tables = "";
	$wheres = "";

	foreach ($table as $t) {
		$tables .= ($tables == "") ? "" : ", ";
		$tables .= $t;
	}

	foreach ($where as $t) {
		$wheres .= ($wheres == "") ? "" : " and ";
		$wheres .= $t;
	}

	$query = "SELECT $select from $tables where $wheres LIMIT $recordOffset, $countPerPage";
	$result = Database::executeQuery($query);

	if (count($result) > 0) {

		$query = "SELECT $select from $tables where $wheres";
		$total = Database::countRow($query);

		foreach ($result as $product) {
			echo "<div class='w12e pull-left'>";
			include("modules/displayProducts.tpl.php");
			echo "</div>";
		}
?>
</div> <!-- end products wrapper -->
<?php
		include_once("modules/pagination.tpl.php");
	} 

	else {
		echo "<div class='alert alert-danger'>Không có sách nào.</div>";
	}
?>