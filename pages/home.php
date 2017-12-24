<?php changeTitle("Trang chủ"); ?>

<div class="clearfix"> <!-- new wrapper -->
	<h2 class="page-header">Sách mới</h2>

<?php
	$recordPerPage = 8;
	$query = "SELECT pd.id, pd.name, pd.author, pd.price, pd.img FROM product pd, category g, publisher pls WHERE pd.publisher = pls.id and pls.enable = 1 and pd.category = g.id and g.enable = 1 and pd.enable = 1 ORDER BY timestamp desc LIMIT 0, $recordPerPage";
	$result = Database::executeQuery($query);

	if (count($result) > 0) {
		foreach ($result as $product) {
			echo "<div class='w12e pull-left'>";
			include("modules/displayProducts.tpl.php");
			echo "</div>";
		}
	}
?>
</div> <!-- end of new products wrapper -->


<div class="clearfix"> <!-- bestseller wrapper -->
	<h2 class="page-header">Sách được mua nhiều</h2>

<?php
	$query = "SELECT count(*) as SLDM, pd.id, pd.name, pd.author, pd.price, pd.img FROM order_items oi, product pd, category g, publisher pls WHERE oi.product_id = pd.ID and pd.publisher = pls.id and pls.enable = 1 and pd.category = g.id and g.enable = 1 and pd.enable = 1 GROUP BY pd.id ORDER BY count(*) DESC LIMIT 0, $recordPerPage";
	$result = Database::executeQuery($query);

	if (count($result) > 0) {
		foreach ($result as $product) {
			echo "<div class='w12e pull-left'>";
			include("modules/displayProducts.tpl.php");
			echo "</div>";
		}
	}
?>
</div> <!-- end of bestseller wrapper -->