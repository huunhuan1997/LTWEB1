<?php
	if (!isset($_GET['id'])) {
		redirect("p=error");
	}

	$id = $_GET['id'];
	$query = "SELECT * from `users` where id = $id";
	$user = Database::first($query);

	if ($user != -1) {

		$query = "SELECT id, ten from `user_types`";
		$usertypes = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa tài khoản #<?php echo $id; ?></h2>
	<div class="panel-body">
		<form action="libs/handling/updateaccount.php?id=<?php echo $id; ?>" method="post" class="frmEdit w40p center-block">
			Username: 
			<input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
			Mật khẩu: 
			<input type="password" class="form-control" name="password">
			Loại tài khoản: 
			<select class="form-control" name="loaind">
				<option value="" class="hidden">-- Chọn loại tài khoản --</option>
				<?php
				foreach ($usertypes as $stt) {
					$sid = $stt['id'];
					$sn = $stt['ten'];
					echo "<option value='$sid'";
					echo $sid == $user['loaind'] ? "selected='selected'" : "";
					echo ">$sn</option>";
				}
				?>	
			</select>
			Họ tên: 
			<input type="text" class="form-control" name="hoten" value="<?php echo $user['hoten']; ?>">
			Ngày sinh: 
			<input type="date" class="form-control" name="ngaysinh" value="<?php echo date('Y-m-d', strtotime($user['ngaysinh'])); ?>">
			Địa chỉ: 
			<input type="text" class="form-control" name="diachi" value="<?php echo $user['diachi']; ?>">
			Email: 
			<input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
			<button type="submit" class="btn btn-primary center-block">Sửa</button>
		</form>
	</div>
</div>

<?php
	}
?>