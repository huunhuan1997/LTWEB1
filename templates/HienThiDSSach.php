<?php         
     $temp  = $TenSanPham; 
     if(strlen($TenSanPham) > 25)
     {
         $TenSanPham = substr($TenSanPham,0,18) . '...';
     } 

?>
<div class='w12e pull-left' title ="<?php echo $temp;  ?>">
    <div class="thumbnail productThumb">
        <a href="?a=4&id=<?php echo $MaSanPham;?>">
            <img src="./images/Product/<?php echo $HinhURL; ?>" alt="">
        <h4><?php echo $TenSanPham; ?></h4>
        <h4 class="small"><?php echo $TenTacGia; ?></h4>
        <h4 class="price"><?php echo number_format($GiaSanPham); ?> VNĐ</h4>
        </a>
    </div>
</div>