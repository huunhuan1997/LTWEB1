<?php 
    $MaTaiKhoan = $_GET['id'];
    $BiXoa = $_GET['BiXoa'];
    if($BiXoa == 0)
    {
        $BiXoa = 1;
    }
    else
        $BiXoa = 0;
    $Query ="update taikhoan  set BiXoa = $BiXoa where MaTaiKhoan = $MaTaiKhoan";
    $result = Provider::execQuery($Query);
    if($result)
    {
        Provider::changeURL("index.php?a=6");
    }
?>