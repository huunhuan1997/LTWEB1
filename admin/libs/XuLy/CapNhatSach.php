<?php 
    $MaSanPham = $_GET['id'];
    $TenSanPham = $_POST['TenSanPham'];
    $TenTacGia = $_POST['TenTacGia'];
    $MaLoaiSanPham = $_POST['LoaiSanPham'];
    $MaHangSanXuat = $_POST['NXB'];
    $GiaSanPham = $_POST['GiaSanPham'];
    $MoTa = $_POST['MoTa'];

    $query = "update sanpham
                set TenSanPham = '$TenSanPham',
                    TenTacGia = '$TenTacGia',
                    MaLoaiSanPham = $MaLoaiSanPham,
                    MaHangSanXuat = $MaHangSanXuat,
                    GiaSanPham = $GiaSanPham,
                    MoTa = '$MoTa'";
    if (!empty($_FILES['HinhURL']['name']) && $_FILES['HinhURL']['error'] == 0)
    {
       $HinhURL = $_FILES['HinhURL']['name'];
       move_uploaded_file($_FILES['HinhURL']['tmp_name'], "../images/product/" . $HinhURL);
       $query = $query. ", HinhURL = '$HinhURL'";
   }
   $query = $query. " where MaSanPham = $MaSanPham";
   $result = Provider::execQuery($query);
   if($result)
   {
    Provider::ChangeURL("index.php?a=3");
   }
?>