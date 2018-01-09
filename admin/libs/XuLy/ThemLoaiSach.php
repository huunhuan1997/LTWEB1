<?php 
    if(!empty($_POST['TenLoaiSach']))
    {
        $LoaiSach = $_POST['TenLoaiSach'];
        $query ="insert into loaisanpham(TenLoaiSanPham) values('$LoaiSach')";
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
