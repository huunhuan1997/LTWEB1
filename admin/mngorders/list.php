<?php

	$where = "";

	if (!empty($_GET['userid'])) {
		$userid = $_GET['userid'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "o.userid = $userid";
	}

	if (!empty($_GET['totalcost'])) {
		$totalcost = $_GET['totalcost'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "o.totalcost = $totalcost";
	}

	if (!empty($_GET['modified'])) {
		$modified = date("Y-m-d", strtotime($_GET['modified']));
		$where .= ($where == "") ? "" : "and ";
		$where .= "o.created like '$modified%'";
	}

	if (!empty($_GET['status'])) {
		$status = $_GET['status'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "o.status = '$status'";
	}

	$query = "SELECT id, name from `order_types`";
	$ordertypes = Database::executeQuery($query);
?>

<div>
	<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="p" value="listorder">
		<div class="input-group">
			<input type="date" class="form-control" name="modified" value="<?php echo !empty($modified) ? $modified : ""; ?>">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="OpenAdvSearch();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item"><input type="text" class="form-control" placeholder="Mã KH" name="userid" value="<?php echo !empty($userid) ? $userid : ""; ?>"></li>
				<li class="list-group-item"><input type="text" class="form-control" placeholder="Tổng tiền" name="totalcost" value="<?php echo !empty($totalcost) ? $totalcost : ""; ?>"></li>
				<li class="list-group-item">
					<select class="form-control" name="status" id="cbbStatus">
						<option value="" class="hidden">-- Chọn trạng thái --</option>
						<?php
						foreach ($ordertypes as $stt) {
							$sid = $stt['id'];
							$sn = $stt['name'];
							echo "<option value='$sid'";
							echo ($sid == (isset($status) ? $status : -1)) ? "selected='selected'" : "";
							echo ">$sn</option>";
						}
						?>	
					</select>					
				</li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?p=addorder';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>
</div>
<table class="table table-striped" id="orderList">
	<tr class="nb active">
		<td>Mã DH</td>
		<td>Mã KH</td>
		<td>Tổng tiền</td>
		<td>Ngày lập đơn</td>
		<td colspan="4">Trạng thái</td>
	</tr>
	<?php
		$query = "SELECT o.*, ot.name from orders o, order_types ot where o.status = ot.id";
		$query .= $where == "" ? "" : " and $where";
		$orders = Database::executeQuery($query);
		foreach ($orders as $order) {
			$id = $order['id'];
			$items = Database::executeQuery("select pd.id, pd.name, pd.author, pd.price, oi.quantity from order_items oi, product pd where oi.order_id = $id and oi.product_id = pd.id");
	?>
	<tr>
		<td><?php echo $order['id']; ?></td>
		<td><?php echo $order['user_id']; ?></td>
		<td><?php echo $order['totalcost']; ?></td>
		<td><?php echo $order['created']; ?></td>
		<td><?php echo $order['name']; ?></td>
		<td><a href="?p=editorder&id=<?php echo $order['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="?p=deleteorder&id=<?php echo $order['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
		<td><a onclick="OpenOrderDetail(<?php echo $order['id']; ?>);"><span class="glyphicon glyphicon-th-list"></span></a></td>
	</tr>
	<tr class="hidden" id="orderdetail<?php echo $order['id']; ?>">
		<td colspan="5">
			<table class="table nb">
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