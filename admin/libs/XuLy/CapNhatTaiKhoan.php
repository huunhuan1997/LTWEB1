<?php
    $MaTaiKhoan = $_GET['id'];
    $TenDangNhap = trim($_POST['txtTenDangNhap']);
    $MatKhau = md5($_POST['txtMatKhau']);
    $TenHienThi = $_POST['txtHoTen'];
    $DienThoai = $_POST['txtDienThoai'];
    $Email = $_POST['txtEmail'];
    $LoaiTaiKhoan = $_POST['LoaiTaiKhoan'];
    $query = "update taikhoan
                set TenDangNhap = '$TenDangNhap',
                    MatKhau = '$MatKhau',
                    TenHienThi = '$TenHienThi',
                    DienThoai = '$DienThoai',
                    Email = '$Email',
                    MaLoaiTaiKhoan = $LoaiTaiKhoan
                where MaTaiKhoan = $MaTaiKhoan";
    $result = Provider::execQuery($query);
    if($result)
    {
        Provider::changeURL("index.php?a=6");
    }
?> 