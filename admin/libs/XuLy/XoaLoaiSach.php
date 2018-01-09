<?php 
    $MaLoaiSanPham = $_GET['id'];
    $BiXoa = $_GET['BiXoa'];
    if($BiXoa == 0)
        $BiXoa = 1;
    else
        $BiXoa = 0;
    $query = "update loaisanpham set BiXoa = $BiXoa where MaLoaiSanPHam = $MaLoaiSanPham";
    $result = Provider::execQuery("$query");
    if($result)
    {
        Provider::changeURL("index.php?a=4");
    }
?>