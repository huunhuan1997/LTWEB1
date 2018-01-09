<?php
    if(isset($_GET['id']))
    {
        $MaSanPham = $_GET['id'];
        $SoLuong = $_POST['txtSoLuongNhap'];
        $gioHang = new ShoppingCart();
        if(isset($_SESSION['gioHang']))
            $gioHang = unserialize($_SESSION['gioHang']);
        $gioHang->Add($MaSanPham,$SoLuong);
        $_SESSION['gioHang'] = serialize($gioHang);

        Provider::ChangeURL('index.php?a=6');
    }
    else
    {
        Provider::ChangeURL('index.php?a=0&id=3');
    }

?>