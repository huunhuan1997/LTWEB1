<div class="container" id="topBar">
<div class="navbar navbar-inverse">
	<ul class="nav navbar-nav pull-right">
	<?php
            if(isset($_SESSION['MaTaiKhoan']))
            {
                include ("modules/mThongTinTaiKhoan.php");
            }
            else
            {
                include ("modules/mDangNhapTaiKhoan.php");
            }
        ?>
	</ul>
</div>
</div>