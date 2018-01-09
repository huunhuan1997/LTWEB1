<?php 
    $MaHangSanXuat = $_GET['id'];
    $BiXoa = $_GET['BiXoa'];
    if($BiXoa == 0)
        $BiXoa = 1;
    else
        $BiXoa = 0;
    $query = "update hangsanxuat set BiXoa = $BiXoa where MaHangSanXuat = $MaHangSanXuat";
    $result = Provider::execQuery("$query");
    if($result)
    {
        Provider::changeURL("index.php?a=5");
    }
?>