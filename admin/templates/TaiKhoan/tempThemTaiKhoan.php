<?php 

	changeTitle("Đăng ký tài khoản"); 
    $query ="select MaLoaiTaiKhoan,TenLoaiTaiKhoan from loaitaikhoan";
    $LoaiTaiKhoan = Provider::execQuery($query);

    if (isset($_GET['check']) && $_GET['check'] == 1) 
    {
		$ThongBao = "Đăng ký thành công";
?>
    <div class='alert alert-success'><?php echo $ThongBao; ?></div>
<?php
    } 
     else if (isset($_GET['check']) && $_GET['check'] == 0) 
        {
			$ThongBao = "Tên đăng nhập  đã được sử dụng";
?>
    <div class='alert alert-danger'><?php echo $ThongBao; ?></div>
<?php 
        }
?>    

<div class="w100p well">
	<form action="index.php?a=25" method="post" class="w60p center-block" onsubmit="return KiemTraThongTinDangKi();">
		<h2 class="page-header text-center">Thêm Tài Khoản</h2>
		<p>Tên đăng nhập: <input autofocus='autofocus' class="form-control" type="text" id="txtTenDangNhap" name="txtTenDangNhap"></p>
		<p>Mật khẩu: <input class="form-control" type="password" id="txtMatKhau" name="txtMatKhau"></p>
		<p>Họ tên: <input  class="form-control" type="text" id="txtHoTen" name="txtHoTen"></p> 	  
        <p>Loại tài khoản:
        <select class="form-control" name="LoaiTaiKhoan">
				<option value="" class="hidden">-- Chọn loại tài khoản --</option>
				<?php
                while($row = mysqli_fetch_array($LoaiTaiKhoan)) 
                {
					$Ma = $row['MaLoaiTaiKhoan'];
					$Ten = $row['TenLoaiTaiKhoan'];
                    echo "<option value='$Ma'";
                    echo "selected='selected'";
					echo ">$Ten</option>";
				}
				?>	
			</select>
        </p>	 	
        <p>Điện thoại: <input class="form-control" type="text" id="txtDienThoai" name="txtDienThoai"></p>
		<p>Địa chỉ: <input  class="form-control" type="text" id="txtDiaChi" name="txtDiaChi"></p>
		<p>Email: <input class="form-control" type="email" id="txtEmail" name="txtEmail" placeholder="example@gmail.com"></p>
		<p><button type="submit" class="btn btn-primary center-block">Đăng ký</button></p>
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