<li><a href="index.php?a=6"><?php     echo "Hello, ".$_SESSION["TenHienThi"]." | "; ?></a></li>
		<?php
                $maLoai = $_SESSION["MaLoaiTaiKhoan"];
				if ($maLoai== 2) 
				{
		?>
			<li><a href="admin"> Trang quản lý</a></li>
		<?php 
				}
		?>
<li><a href="index.php?a=11"> Đăng xuất</a></li>