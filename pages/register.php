<?php 

	changeTitle("Đăng ký tài khoản"); 

	if (isset($_GET['code']) && $_GET['code'] == 1) {
		$message = "Đăng ký thành công";
?>
<div class='alert alert-success'><?php echo $message; ?></div>
<?php
	} else {
		if (isset($_GET['code']) && $_GET['code'] == 0) {
			$message = "Username đã được sử dụng";
?>
<div class='alert alert-danger'><?php echo $message; ?></div>
<?php
		}
?>

<div class="w100p well">
	<form action="libs/handling/register.php" method="post" class="w60p center-block" onsubmit="return CheckRegister();">
		<h2 class="page-header text-center">Đăng ký tài khoản</h2>
		<p>Tên đăng nhập: <input class="form-control" type="text" id="regUsername" name="username"></p>
		<p>Mật khẩu: <input class="form-control" type="password" id="regPassword" name="password"></p>
		<p>Nhập lại mật khẩu: <input class="form-control" type="password" id="regRePassword"></p>
		<p>Họ tên: <input class="form-control" type="text" id="regHoTen" name="hoten"></p> 	  	 	
		<p>Ngày sinh: <input class="form-control" type="date" id="dtNgaySinh" name="ngaysinh"></p>
		<p>Địa chỉ: <input class="form-control" type="text" id="regDiaChi" name="diachi"></p>
		<p>Email: <input class="form-control" type="email" id="regEmail" name="email" placeholder="example@gmail.com"></p>
		<p><button type="submit" class="btn btn-primary center-block">Đăng ký</button></p>
	</form>
</div>

<?php
	}
?>