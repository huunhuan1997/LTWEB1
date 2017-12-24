<?php changeTitle("Lịch sử giao dịch"); ?>

<table class="table table-striped" id="userHistory">
	<tr class="active">
		<td class="nb">Mã hóa đơn</td>
		<td>Ngày giao dịch</td>
		<td>Tổng chi phí</td>
		<td>Trạng thái</td>
		<td></td>
	</tr>
	<?php
		$userid = isset($cuser) ? $cuser['id'] : "-1";
		$query = "SELECT o.*, ot.name from orders o, order_types ot where o.user_id = $userid and o.status = ot.id";
		$orders = Database::executeQuery($query);
		foreach ($orders as $order) {
			$id = $order['id'];
			$items = Database::executeQuery("select pd.id, pd.name, pd.author, pd.price, oi.quantity from order_items oi, product pd where oi.order_id = $id and oi.product_id = pd.id");
	?>
	<tr>
		<td><?php echo $order['id'] ?></td>
		<td><?php echo $order['created']; ?></td>
		<td><?php echo number_format($order['totalcost']); ?> VND</td>
		<td><?php $stt = $order['status']; echo $order['name']; ?></td>
		<td><a onclick="OpenOrderDetail(<?php echo $order['id']; ?>);"><span class="glyphicon glyphicon-th-list"></span></a></td>
	</tr>
	<tr class="hidden" id="orderdetail<?php echo $order['id']; ?>">
		<td colspan="5">
			<table class="table">
				<tr class="active">
					<td>Mã sách</td>
					<td>Tên sách</td>
					<td>Tác giả</td>
					<td>Giá</td>
					<td>Số lượng</td>
				</tr>
				<?php foreach ($items as $item) { ?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['author']; ?></td>
					<td><?php echo $item['price']; ?></td>
					<td><?php echo $item['quantity']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
	<?php
		}
	?>
</table>