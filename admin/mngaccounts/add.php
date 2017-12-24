<?php
	$query = "SELECT id, ten from `user_types`";
	$usertypes = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Thêm tài khoản</h2>
	<div class="panel-body">
		<form action="libs/handling/addaccount.php" method="post" class="frmEdit w40p center-block">
			Username: 
			<input type="text" class="form-control" name="username">
			Mật khẩu: 
			<input type="password" class="form-control" name="password">
			Loại tài khoản: 
			<select class="form-control" name="loaind">
				<option value="" class="hidden">-- Chọn loại tài khoản --</option>
				<?php
				foreach ($usertypes as $stt) {
					$sid = $stt['id'];
					$sn = $stt['ten'];
					echo "<option value='$sid'>$sn</option>";
				}
				?>	
			</select>
			Họ tên: 
			<input type="text" class="form-control" name="hoten">
			Ngày sinh: 
			<input type="date" class="form-control" name="ngaysinh">
			Địa chỉ: 
			<input type="text" class="form-control" name="diachi">
			Email: 
			<input type="email" class="form-control" name="email">
			<button type="submit" class="btn btn-primary center-block">Thêm</button>
		</form>
	</div>
</div>