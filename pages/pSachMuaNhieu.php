<div class="clearfix">
	<h2 class="page-header">Sách được mua nhiều</h2>

<?php
	$SoLuongLay = 8;
	$query =" SELECT sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,tg.TenTacGia,sp.HinhURL
                from SanPham sp,tacgia tg
                where sp.MaTacGia = tg.MaTacGia
                and sp.BiXoa = FALSE
                ORDER BY SoLuongBan desc 
                LIMIT 0, $SoLuongLay";
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
?>
</div> 