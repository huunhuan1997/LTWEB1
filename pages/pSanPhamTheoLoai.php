
<?php changeTitle("Danh sách sản phẩm"); ?>
<div class="clearfix">
	<h2 class="page-header">Danh sách theo loại</h2>

<?php
    if(isset($_GET["id"]) == false)
        Provider::ChangeURL("index.php?a=0&id=1");
	$query ="  SELECT sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,tg.TenTacGia,sp.HinhURL
                from SanPham sp,TacGia tg
                where sp.MaTacGia = tg.MaTacGia
                and sp.BiXoa = FALSE and sp.MaLoaiSanPham =".$_GET["id"];
    $list = Provider::execQuery($query);

	if (count($list) > 0) {
		while($row = mysqli_fetch_array($list)){
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