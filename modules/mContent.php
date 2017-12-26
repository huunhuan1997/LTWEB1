<?php
    $a = (isset($_GET['a'])) ? $_GET['a'] : 1; 
    
    switch ($a) {
        case 1:
            include ("pages/pHome.php");
            break;
        case 2: 
            include ("pages/pSanPhamTheoHang.php");
            break;
        case 3: 
            include ("pages/pSanPhamTheoLoai.php");
            break;
        case 4:
            include ("pages/pChiTietSanPham.php");
            break;
        case 6:
            include ("pages/pQuanLyGioHang.php");
            break;
        case 10:
            include ("pages/pXuLyDangNhap.php");
            break;
        case 11:
            include ("pages/pDangXuat.php");
            break;
        case 12:
            include ("pages/exThemSanPhamVaoGioHang.php");
            break;
        case 13:
            include ("pages/exCapNhatGioHang.php");
            break;
        default:
            include "pages/pError.php";
            break;
    }
?>