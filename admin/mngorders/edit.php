<?php
	if (!isset($_GET['id'])) {
		redirect("p=error");
	}

	$id = $_GET['id'];
	$query = "SELECT * from `orders` where id = $id";
	$order = Database::first($query);
	if ($order != -1) {

		$query = "SELECT id, name from `order_types`";
		$ordertypes = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa đơn đặt hàng #<?php echo $id; ?></h2>
	<div class="panel-body">
		<form action="libs/handling/updateorder.php?id=<?php echo $id; ?>" method="post" class="frmEdit w40p center-block">
			Ngày tạo: 
			<input type="datetime-local" class="form-control" name="created" value="<?php echo date('Y-m-d\TH:i:s', strtotime($order['created'])); ?>">
			Mã khách hàng: 
			<input type="text" class="form-control" placeholder="Mã KH" name="user_id" value="<?php echo $order['user_id']; ?>">
			Tổng tiền: 
			<input type="text" class="form-control" placeholder="Tổng tiền" name="totalcost" value="<?php echo $order['totalcost']; ?>">
			Trạng thái: 
			<select class="form-control" name="status" id="cbbStatus">
				<option value="" class="hidden">-- Chọn trạng thái --</option>
				<?php
				foreach ($ordertypes as $stt) {
					$sid = $stt['id'];
					$sn = $stt['name'];
					echo "<option value='$sid'";
					echo ($sid == $order['status']) ? "selected='selected'" : "";
					echo ">$sn</option>";
				}
				?>	
			</select>
			<button type="submit" class="btn btn-primary center-block">Sửa</button>
		</form>
	</div>
</div>

<?php
	}
?>