<?php
    changeTitle('Quản lý tài khoản');
    $query ="select tk.MaTaiKhoan,tk.TenDangNhap,tk.MatKhau,tk.TenHienThi,tk.DiaChi,tk.DienThoai,tk.Email,ltk.TenLoaiTaiKhoan,tk.MaLoaiTaiKhoan,tk.BiXoa
            from taikhoan tk,loaitaikhoan ltk
            where tk.MaLoaiTaiKhoan = ltk.MaLoaiTaiKhoan ";

         if(!empty($_GET['TenDangNhap']))
         {
            $TenDangNhap = $_GET['TenDangNhap'];
             $query = $query. "and  TenDangNhap like '%$TenDangNhap%'";
         }  
?>

<div>
	<?php include('templates/TaiKhoan/tempTimKiemTaiKhoan.php'); ?>
</div>
<table class="table table-striped" id="orderList">
	<tr class="nb active">
        <td>Mã</td>
        <td>Tên Đăng Nhập</td>
        <td>Loại Tài Khoản</td>
        <td>Tên Hiển Thị</td>
        <td>Điện Thoại</td>
        <td>Địa Chỉ</td>
        <td colspan="3">Email</td>
	</tr>
	<?php
		$TK = Provider::execQuery("$query");
        while($row = mysqli_fetch_array($TK))
        {
	?>
	<tr>
		<?php 	include('templates/TaiKhoan/tempDSTaiKhoan.php'); ?> 
	</tr>
	<?php
		}
	?>
</table>