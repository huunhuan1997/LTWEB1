
<?php
    changeTitle("Cập nhật tài khoản");
    $MaTaiKhoan = $_GET['id'];
    $query ="select tk.MaTaiKhoan,tk.TenDangNhap,tk.MatKhau,tk.TenHienThi,tk.DiaChi,tk.DienThoai,tk.Email,ltk.TenLoaiTaiKhoan,tk.MaLoaiTaiKhoan,tk.BiXoa
            from taikhoan tk,loaitaikhoan ltk
            where tk.MaLoaiTaiKhoan = ltk.MaLoaiTaiKhoan 
                    and tk.MaTaiKhoan = $MaTaiKhoan";
    $TaiKhoan = Provider::execQuery($query);
    $rowTK = mysqli_fetch_array($TaiKhoan);
    $query ="select MaLoaiTaiKhoan,TenLoaiTaiKhoan from loaitaikhoan";
    $LoaiTaiKhoan = Provider::execQuery($query);
?>
<div class="w100p well">
	<form action="index.php?a=28&id=<?php echo $MaTaiKhoan; ?>" method="post" class="w60p center-block" onsubmit="return KiemTraThongTinDangKi();">
		<h2 class="page-header text-center">Cập Nhật Tài Khoản #<?php echo $MaTaiKhoan; ?></h2>
		<p>Tên đăng nhập: <input value="<?php echo $rowTK["TenDangNhap"];  ?>" autofocus='autofocus' class="form-control" type="text" id="txtTenDangNhap" name="txtTenDangNhap"></p>
		<p>Mật khẩu: <input class="form-control" type="password" id="txtMatKhau" name="txtMatKhau"></p>
		<p>Họ tên: <input value="<?php echo $rowTK["TenHienThi"]; ?>" class="form-control" type="text" id="txtHoTen" name="txtHoTen"></p> 	  
        <p>Loại tài khoản:
        <select class="form-control" name="LoaiTaiKhoan">
				<option value="" class="hidden">-- Chọn loại tài khoản --</option>
				<?php
                while($row = mysqli_fetch_array($LoaiTaiKhoan)) 
                {
					$Ma = $row['MaLoaiTaiKhoan'];
					$Ten = $row['TenLoaiTaiKhoan'];
					echo "<option value='$Ma'";
					echo $Ma == $rowTK['MaLoaiTaiKhoan'] ? "selected='selected'" : "";
					echo ">$Ten</option>";
				}
				?>	
			</select>
        </p>	 	
        <p>Điện thoại: <input value="<?php echo $rowTK["DienThoai"]; ?>" class="form-control" type="text" id="txtDienThoai" name="txtDienThoai"></p>
		<p>Địa chỉ: <input value="<?php echo $rowTK["DiaChi"]; ?>" class="form-control" type="text" id="txtDiaChi" name="txtDiaChi"></p>
		<p>Email: <input value="<?php echo $rowTK["Email"]; ?>" class="form-control" type="email" id="txtEmail" name="txtEmail" placeholder="example@gmail.com"></p>
		<p><button type="submit" class="btn btn-primary center-block">Cập Nhật</button></p>
	</form>
</div>
<script>
function KiemTraThongTinDangKi() {
    
    var TenDangNhap = document.getElementById("txtTenDangNhap").value;
    var MatKhau = document.getElementById("txtMatKhau").value;
    var HoTen = document.getElementById("txtHoTen").value;
    var DiaChi = document.getElementById("txtDiaChi").value;
    var Email = document.getElementById("txtEmail").value;
	if(TenDangNhap == "")
	{
		alert("Tên đăng nhập không được để trống");
		return false;
	}
    if(MatKhau.length <8)
    {
        alert("Độ dài mật khẩu phải 8 kí tự trở lên");
        return false;
    }
	if(HoTen == "")
	{
		alert("Họ tên không được để trống");
		return false;
	}

    var emailPattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (Email.length == 0 || !emailPattern.test(Email))
     {
        alert("Email không hợp lệ");
        return false;
    }

    return true;
}
</script>