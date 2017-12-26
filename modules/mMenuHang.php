<div class="panel panel-default" id="cateMdl">
<div class="panel-heading">NHÀ XUẤT BẢN</div>
<ul class="list-group">
<?php
    $query = "SELECT MaHangSanXuat, TenHangSanXuat FROM hangsanxuat where BiXoa = 0";
    $list = Provider::execQuery($query);
    while($row = mysqli_fetch_array($list)) 
    {
        $url = "index.php?a=2&id=".$row["MaHangSanXuat"];
?>
    <li><a class="list-group-item" href="<?php echo $url; ?>"><?php echo $row["TenHangSanXuat"]; ?></a></li>
<?php
    }
?>
</ul>
</div>