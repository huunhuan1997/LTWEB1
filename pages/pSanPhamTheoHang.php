
<?php changeTitle("Danh sách sản phẩm"); ?>
<div class="clearfix">
	<h2 class="page-header">Danh sách theo hãng</h2>

<?php
    if(isset($_GET["id"]) == false)
        Provider::ChangeURL("index.php?a=0&id=1");
	$query ="   SELECT sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,sp.TenTacGia,sp.HinhURL
                from sanpham sp
                where  sp.BiXoa = FALSE 
                and sp.MaHangSanXuat = ".$_GET["id"];
    $list = Provider::execQuery($query); 
	$row = mysqli_fetch_array($list);
    if(count($row) > 0)
    {
        $TenSanPham = $row["TenSanPham"];
        $HinhURL = $row["HinhURL"];
        $MaSanPham = $row["MaSanPham"];
        $GiaSanPham = $row["GiaSanPham"];
        $TenTacGia = $row["TenTacGia"];

        include("templates/HienThiDSSach.php");
        while($row = mysqli_fetch_array($list))
        {
            $TenSanPham = $row["TenSanPham"];
            $HinhURL = $row["HinhURL"];
            $MaSanPham = $row["MaSanPham"];
            $GiaSanPham = $row["GiaSanPham"];
            $TenTacGia = $row["TenTacGia"];

            include("templates/HienThiDSSach.php");
        }
    }
    else
    {
        echo "<div class='alert alert-danger'>Không có sách nào.</div>";
    }
?>
</div> 