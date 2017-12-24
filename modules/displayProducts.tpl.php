<div class="thumbnail productThumb">
	<!-- product image -->
	<a href="?p=productdetail&id=<?php echo $product['id']; ?>">
		<img src="imgs/product/<?php echo $product['img']; ?>" alt="">
	</a>

	<!-- product name -->
	<h4><?php echo $product['name']; ?></h4>
	<h4 class="small"><?php echo $product['author']; ?></h4>
	<h4 class="price"><?php echo number_format($product['price']); ?> VNĐ</h4>
</div>