<?php changeTitle("Giỏ hàng của tôi"); ?>

<table class="table table-striped" id="cartItems">
	<tr class="nb">
		<td></td>
		<td></td>
		<td><button class="btn btn-danger" onclick="window.location.href = 'libs/handling/addorder.php';">Đặt hàng</button></td>
		<td><button class="btn btn-primary" onclick="window.location.href = 'libs/handling/dellallcartitems.php';">Hủy tất cả</button></td>
	</tr>
	<tr>
		<th>Sản phẩm</th>
		<th>Số lượng</th>
		<th></th>
		<th></th>
	</tr>
	<?php
		$userid = isset($cuser['id']) ? $cuser['id'] : "";
		$query = "SELECT `product_id`, `quantity`, `created` from `cart_items` where `user_id` = $userid";
		$items = Database::executeQuery($query);
		foreach ($items as $item) {
			$product = Product::getProduct($item['product_id']);
			$quantity = $item['quantity'];
	?>
	<form action="libs/handling/updatecart.php" method="get" name="frmCartItem">
		<tr>
			<td width="20%">
				<input type="hidden" name="productid" value="<?php echo $product['id']; ?>">
				<?php include("modules/displayproducts.tpl.php"); ?>
			</td>
			<td><input type="text" class="form-control wA" name="quantity" id="quantity" value="<?php echo $quantity; ?>"></td>
			<td><button type="submit" name="action" value="update" class="btn btn-success">Cập nhật</button></td>
			<td><button type="submit" name="action" value="delete" class="btn btn-info">Hủy</button></td>
		</tr>
	</form>
	<?php
		}
	?>
</table>