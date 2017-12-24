<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT pd.count, pd.name, pd.author, pls.name as publisher, g.name as catename, pd.description, pd.price, pd.img, pd.category as cateid FROM product pd, publisher pls, category g WHERE pd.id = $id and pd.publisher = pls.id and pd.category = g.id";
	$product = Database::first($query);

	if ($product != -1) {
		$name = $product['name'];
		$author = $product['author'];
		changeTitle("$name - $author");
?>

<div class="clearfix" id="productDetail">
	<div class="w40p thumbnail pull-left">
		<img src="imgs/product/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
	</div>
	<div class="w60p pull-right">
		<ul>
			<li class="list-group-item"><h2><?php echo $product['name']; ?></h2></li>
			<li class="list-group-item">Tác giả: <?php echo $product['author']; ?></li>
			<li class="list-group-item">Nhà xuất bản: <?php echo $product['publisher']; ?></li>
			<li class="list-group-item">Thể loại: <?php echo $product['catename']; ?></li>
			<li class="list-group-item">Giới thiệu: <?php echo $product['description']; ?></li>
			<li class="list-group-item">Số lượng còn: <?php echo $product['count']; ?> quyển</li>
			<li class="list-group-item"><h4>Giá: <span class="price"><?php echo number_format($product['price']); ?> VNĐ</span></h4></li>
			<li class="list-group-item">
				<button class="btn btn-danger" onclick="AddToCart(<?php echo $id . ", " . $product['count']; ?>);">Đặt vào giỏ hàng</button>
				Số lượng: <input type="text" class="list-group-item" name="txtQuantity" id="txtQuantity">
			</li>
		</ul>
	</div>
</div>
<div class="clearfix">
	<h2 class="page-header">Sách cùng thể loại</h2>
<?php
		$cate = $product['cateid'];
		$pLimit = 4;
		$query = "SELECT pd.id, pd.name, pd.author, pd.price, pd.img FROM product pd, publisher pls WHERE pd.publisher = pls.id and pls.enable = 1 and pd.category = $cate and pd.enable = 1 and pd.id <> $id LIMIT 0, $pLimit";
		$products = Database::executeQuery($query);

		if (count($products) > 0) {
			foreach ($products as $product) {
				echo "<div class='w12e pull-left'>";
				include("modules/displayProducts.tpl.php");
				echo "</div>";
			}
		}
?>
</div>
<?php
	} else {
		echo "<div class='alert alert-danger'>Không tìm thấy sách này.</div>";
	}
} else {
	include_once("pages/error.php");
}
?>