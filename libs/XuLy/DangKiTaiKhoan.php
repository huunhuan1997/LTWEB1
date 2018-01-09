<?php
    $TK = new TaiKhoan();
    $TK->TenDangNhap = trim($_POST['txtTenDangNhap']);
    $TK->MatKhau = md5($_POST['txtMatKhau']);
    $TK->TenHienThi = $_POST['txtHoTen'];
    $TK->DienThoai = $_POST['txtDienThoai'];
    $TK->Email = $_POST['txtEmail'];
    if(XuLyTaiKhoan::KiemTraTrungTen($TK->TenDangNhap) == false)
    {
        Provider::ChangeURL("index.php?a=8&check=0");
    }
    else if(XuLyTaiKhoan::DangKiTaiKhoan($TK))
    {
        Provider::ChangeURL("index.php?a=8&check=1");
    }
    else
    {
        Provider::ChangeURL("index.php?a=8&check=2");
    }
?> 