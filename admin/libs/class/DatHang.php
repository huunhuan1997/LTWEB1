<?php 
    class DonDatHang
    {
        public $NgayLap;
        public $TongTien;
        public $MaTaiKhoan;
    }
    class ChiTietDonDatHang
    {
        public $SoLuong;
        public $GiaBan;
        public $MaDonDatHang;
        public $MaSanPham;
    }
    class XuLyDatHang
    {
        public static function CapNhatSoLuongTon($MaSanPham,$SoLuong)
        {
            $query ="update sanpham set SoLuongTon = SoLuongTon - $SoLuong where MaSanPham = '$MaSanPham'";
            $result = Provider::execQuery($query);
            return $result;
        }
        public static function LayMaDonDatHangVuaTao()
        {
            $query ="select MaDonDatHang from dondathang ORDER BY MaDonDatHang desc";
            $result = Provider::execQuery($query);
            $row = mysqli_fetch_array($result);
            return $row["MaDonDatHang"];
        }
        public static function ThemDonDatHang($DDH)
        {
            $query = "insert into dondathang(NgayLap,TongThanhTien,MaTaiKhoan) values('$DDH->NgayLap',$DDH->TongTien,'$DDH->MaTaiKhoan')";
            $result = Provider::execQuery($query);
            return $result;
        }
        public static function ThemChiTietDonDatHang($CT)
        {
            $query ="insert into chitietdondathang(SoLuong,GiaBan,MaDonDatHang,MaSanPham)
                    values($CT->SoLuong,$CT->GiaBan,'$CT->MaDonDatHang','$CT->MaSanPham')";
            $result =Provider::execQuery($query);
            return $result;
        }
    }
?>