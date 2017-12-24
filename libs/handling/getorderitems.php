<?php
	include_once("global.php");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$items = Database::executeQuery("select pd.name, pd.author, pd.price, oi.quantity from order_items oi, product pd where oi.order_id = $id and oi.product_id = pd.id");

		if (count($items) > 0) {
?>
<tr class="active">
	<td class="nb">Tên sách</td>
	<td>Tác giả</td>
	<td>Giá</td>
	<td>Số lượng</td>
</tr>
<?php
			foreach ($items as $item) {
?>
				<tr>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['author']; ?></td>
					<td><?php echo $item['price']; ?></td>
					<td><?php echo $item['quantity']; ?></td>
				</tr>
<?php
			}
		}
	}
?>