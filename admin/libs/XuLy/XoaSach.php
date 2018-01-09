<?php 
    $MaSanPham = $_GET['id'];
    $BiXoa = $_GET['BiXoa'];
    if($BiXoa == 0)
        $BiXoa = 1;
    else
        $BiXoa = 0;
    $query = "update sanpham set BiXoa = $BiXoa where MaSanPham = $MaSanPham";
    $result = Provider::execQuery("$query");
    if($result)
    {
        Provider::changeURL("index.php?a=3");
    }
?>