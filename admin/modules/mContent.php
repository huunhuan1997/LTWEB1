<?php
    $a = (isset($_GET['a'])) ? $_GET['a'] : 1; 
    
    switch ($a) 
    {
        case 1:
            include ("pages/pHome.php");
            break;
        case 2: 
            include ("pages/pQLDonDatHang.php");
            break;
        case 3: 
            include ("pages/pQLSach.php");
            break;
        case 4:
            include ("pages/pQLLoaiSach.php");
            break;
        case 5:
            include ("pages/pQLNhaXuatBan.php");
            break;
        case 6:
            include ("pages/pQLTaiKhoan.php");
            break;

        /* URL trong phần hóa đơn mua hàng */
        case 7:
            include ("templates/DonDatHang/tempCapNhatHoaDon.php");
            break;
        case 8:
            include ("libs/XuLy/CapNhatDonDatHang.php");
            break;

        /* URL trong phần quản lý sách */
        case 9:
            include ("templates/Sach/tempCapNhatSach.php");
            break;
        case 10:
            include ("templates/Sach/tempThemSach.php");
            break;
        case 11:
            include ("libs/XuLy/CapNhatSach.php");
            break;
        case 12:
            include ("libs/XuLy/XoaSach.php");
            break;
        case 13:
            include ("libs/XuLy/ThemSach.php");
            break;

        /*  URL trong phần quản lý loại sách */
        case 14:
            include ("templates/LoaiSach/tempThemLoaiSach.php");
            break;
        case 15:
            include ("libs/XuLy/ThemLoaiSach.php");
            break;
        case 16:
            include ("libs/XuLy/XoaLoaiSach.php");
            break;
        case 17:
            include ("templates/LoaiSach/tempCapNhatLoaiSach.php");
            break;
        case 18:
            include ("libs/XuLy/CapNhatLoaiSach.php");
            break;

        /*  URL trong phần quản lý nhà xuất bản */
        case 19:
            include ("templates/NXB/tempThemNXB.php");
            break;
        case 20:
            include ("libs/XuLy/ThemNXB.php");
            break;
        case 21:
            include ("libs/XuLy/XoaNXB.php");
            break;
        case 22:
            include ("templates/NXB/tempCapNhatNXB.php");
            break;
        case 23:
            include ("libs/XuLy/CapNhatNXB.php");
            break;
        
        /*  URL trong phần quản lý tài khoản*/
        case 24:
            include ("templates/TaiKhoan/tempThemTaiKhoan.php");
            break;
        case 25:
            include ("libs/XuLy/ThemTaiKhoan.php");
            break;
        case 26:
            include ("libs/XuLy/XoaTaiKhoan.php");
            break;
        case 27:
            include ("templates/TaiKhoan/tempCapNhatTaiKhoan.php");
            break;
        case 28:
            include ("libs/XuLy/CapNhatTaiKhoan.php");
            break;

        /* đăng xuất */
        case 50:
            include ("libs/XuLy/DangXuat.php");
            break;
        default:
            include "pages/pError.php";
            break;
    }
?>