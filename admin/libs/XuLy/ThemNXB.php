<?php 
    if(!empty($_POST['TenNXB']))
    {
        $TenNXB = $_POST['TenNXB'];
        $query ="insert into hangsanxuat(tenhangsanxuat) values('$TenNXB')";
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
