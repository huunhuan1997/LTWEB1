<?php 
    if(!empty($_POST['TenNXB']))
    {
        $TenNXB = $_POST['TenNXB'];
        $MaNXB = $_GET['id'];
        $query ="update  hangsanxuat set TenHangSanXuat = '$TenNXB' where MaHangSanXuat = $MaNXB";
        $result = Provider::execQuery($query);
        if($result)
        {
            Provider::changeURL("index.php?a=5");
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