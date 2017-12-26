<div class="panel panel-default" id="cateMdl">
<div class="panel-heading">CÁC THỂ LOẠI</div>
<ul class="list-group">
<?php
    $query = "SELECT MaLoaiSanPham, TenLoaiSanPham FROM loaisanpham where BiXoa = 0";
    $list = Provider::execQuery($query);
    while($row = mysqli_fetch_array($list)) 
    {
        $url = "index.php?a=3&id=".$row["MaLoaiSanPham"];
?>
    <li>
        <a class="list-group-item" href="<?php echo $url; ?>"><?php echo $row["TenLoaiSanPham"]; ?></a>
    </li>
<?php
    }
?>
</ul>
</div>