<?php 
	class TaiKhoan
	{
		public $TenDangNhap;
        public $MatKhau;
        public $TenHienThi;
        public $DiaChi;
        public $DienThoai;
        public $Email;
	}
	class XuLyTaiKhoan
    {
        public static function KiemTraTrungTen($username)
        {
            $query = "select * from taikhoan where TenDangNhap = '$username'";
            $result = Provider::execQuery($query);
            $row = mysqli_fetch_array($result);
            if($row != null)
                return false;
            return true;
        }
        public static function DangKiTaiKhoan($TK)  
        {
            $query ="insert into taikhoan(TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan)
                     values('$TK->TenDangNhap','$TK->MatKhau','$TK->TenHienThi','$TK->DiaChi','$TK->DienThoai','$TK->Email',0,1)";
            $result = Provider::execQuery($query);
            return $result;
        }
    }
?>