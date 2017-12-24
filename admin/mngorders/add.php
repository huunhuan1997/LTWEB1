<?php
	$query = "SELECT id, name from `order_types`";
	$ordertypes = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Thêm đơn đặt hàng</h2>
	<div class="panel-body">
		<form action="libs/handling/addorder.php" method="post" class="frmEdit w40p center-block">
			Mã khách hàng: 
			<input type="text" class="form-control" placeholder="Mã KH" name="user_id">
			Tổng tiền: 
			<input type="text" class="form-control" placeholder="Tổng tiền" name="totalcost">
			Trạng thái: 
			<select class="form-control" name="status" id="cbbStatus">
				<option value="" class="hidden">-- Chọn trạng thái --</option>
				<?php
				foreach ($ordertypes as $stt) {
					$sid = $stt['id'];
					$sn = $stt['name'];
					echo "<option value='$sid'>$sn</option>";
				}
				?>	
			</select>
			<button type="submit" class="btn btn-primary center-block">Thêm</button>
		</form>
	</div>
</div>