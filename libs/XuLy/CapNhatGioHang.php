<?php
    if(isset($_POST["action"]))
    {
        $gioHang = unserialize($_SESSION["gioHang"]);   
        $MaSanPham = $_POST["MaSanPham"];
        $SoLuong = $_POST["txtSoLuong"];
        $Action = $_POST["action"];
        if($Action == "Huy")
        {
            $gioHang->delete($MaSanPham);
        }
        else
        {
            if(is_numeric($SoLuong)) 
            {         
                if ($SoLuong == 0)
                    $gioHang->delete($MaSanPham);
                else
                    if($SoLuong > 0)
                        $gioHang->update($MaSanPham, $SoLuong);
              
            }
        }
        $_SESSION["gioHang"] = serialize($gioHang);
       
    }
    Provider::ChangeURL('index.php?a=6');
?>