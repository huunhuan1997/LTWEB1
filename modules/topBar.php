<div class="container" id="topBar">
	<div class="navbar navbar-inverse">
		<ul class="nav navbar-nav pull-right">
		<?php
			if (isset($cuser)) {
		?>
			<li><a href="?p=history"> Xin chào <?php echo $cuser['hoten']; ?> !</a></li>
		<?php
				if ($cuser['loaind'] == 3) {
		?>
			<li><a href="admin"> Trang quản lý</a></li>
		<?php 
				}
		?>
			<li><a onclick="LogOut();"> Đăng xuất</a></li>
		<?php
			} else {
		?>
			<li class="frmLogin">
				<form onsubmit="return CheckLogin()">
					<input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id="txtUsername">
					<input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="txtPassword">
					<button type="submit" class="btn">Đăng nhập</button>
				</form>
			</li>
			<li><a href="index.php?p=register" class="p0"><button class="btn">Đăng ký</button></a></li>			
		<?php
			}
		?>
		</ul>
	</div>
</div>