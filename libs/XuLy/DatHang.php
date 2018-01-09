<?php 
     $gioHang = unserialize($_SESSION['gioHang']);
     $TongTien = $_SESSION['TongTien'];
     $MaTaiKhoan = $_SESSION['MaTaiKhoan'];
     date_default_timezone_set("Asia/Ho_Chi_Minh");
     $NgayLap = date("Y-m-d H:i:s");
     $SL = 0;
     if(isset($_SESSION["gioHang"]))
     {
        if(count($gioHang->listProduct) > 0)
        {
            $DDH = new DonDatHang();
            $DDH->NgayLap = $NgayLap;
            $DDH->TongTien = $TongTien;
            $DDH->MaTaiKhoan = $MaTaiKhoan;
            if(XuLyDatHang::ThemDonDatHang($DDH))
            {
                $MaDonDatHang = XuLyDatHang::LayMaDonDatHangVuaTao();
                foreach($gioHang->listProduct as $p)
                {
                    $query ="   SELECT sp.SoLuongTon, sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,sp.TenTacGia,sp.HinhURL
                                from sanpham sp
                                where sp.BiXoa = FALSE and MaSanPham = $p->id";
                    $result = Provider::execQuery($query);
                    $row = mysqli_fetch_array($result);
                    $CT= new ChiTietDonDatHang();
                    
                    $CT->SoLuong = $p->num;
                    $CT->GiaBan = $row['GiaSanPham'];
                    $CT->MaDonDatHang= $MaDonDatHang;
                    $CT->MaSanPham = $row['MaSanPham'];
                    if(XuLyDatHang::ThemChiTietDonDatHang($CT))
                    {
                        XuLyDatHang::CapNhatSoLuongTon($CT->MaSanPham,$CT->SoLuong);
                        $SL++;
                    }
                }
                if($SL == count($gioHang->listProduct))
                {
                    provider::ChangeURL('index.php?a=6&check=1');
                    $gioHang->deleteAll();
                    $_SESSION['gioHang'] = serialize($gioHang);
                    $_SESSION['TongTien']=0;

                }
                else
                {
                    provider::ChangeURL('index.php?a=6&check=0');
                }
            }
           else
           {
                provider::ChangeURL('index.php?a=6&check=0');
           }
        }
        else
        {
            provider::ChangeURL('index.php?a=0&id=8');
        }
    }
    else
    {
        provider::ChangeURL('index.php?a=0&id=8');
    }
    
?>