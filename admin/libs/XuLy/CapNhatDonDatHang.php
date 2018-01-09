<?php 
    $MaDonDatHang = $_GET['id'];
    $NgayLap = $_POST['NgayLap'];
    $TongThanhTien = $_POST['TongThanhTien'];
    $MaKhachHang= $_POST['MaKhachHang'];
    $TrangThai = $_POST['TrangThai'];

    $query = "update dondathang
              set NgayLap = '$NgayLap',
                  TongThanhTien = $TongThanhTien,
                  MaTaiKhoan = $MaKhachHang,
                  MaTinhTrang = $TrangThai
              where MaDonDatHang = $MaDonDatHang";
    $result = Provider::execQuery($query);
    if($result)
    {
        Provider::ChangeURL("index.php?a=2");
    }
?>