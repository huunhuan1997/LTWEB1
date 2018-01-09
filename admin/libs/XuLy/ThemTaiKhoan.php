<?php
    $TK = new TaiKhoan();
    $TK->TenDangNhap = trim($_POST['txtTenDangNhap']);
    $TK->MatKhau = md5($_POST['txtMatKhau']);
    $TK->TenHienThi = $_POST['txtHoTen'];
    $TK->DienThoai = $_POST['txtDienThoai'];
    $TK->Email = $_POST['txtEmail'];
    $TK->LoaiTaiKhoan = $_POST['LoaiTaiKhoan'];
    if(XuLyTaiKhoan::KiemTraTrungTen($TK->TenDangNhap) == false)
    {
        Provider::ChangeURL("index.php?a=24&check=0");
    }
    else if(XuLyTaiKhoan::DangKiTaiKhoan($TK))
    {
        Provider::ChangeURL("index.php?a=6");
    }
    else
    {
        Provider::ChangeURL("index.php?a=24&check=2");
    }   
?> 