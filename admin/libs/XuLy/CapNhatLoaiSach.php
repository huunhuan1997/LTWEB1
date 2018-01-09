<?php 
    if(!empty($_POST['TenLoaiSach']))
    {
        $TenLoaiSach = $_POST['TenLoaiSach'];
        $MaLoaiSanPham = $_GET['id'];
        $query ="update  loaisanpham set TenLoaiSanPham = '$TenLoaiSach' where MaLoaiSanPham = $MaLoaiSanPham";
        $result = Provider::execQuery($query);
        if($result)
        {
            Provider::changeURL("index.php?a=4");
        }
    }
    else
    {
        ?>
        <div class='alert alert-danger'><?php echo "Vui lòng điền đầy đủ thông tin"; ?></div>
        <?php
    }
?>

?>