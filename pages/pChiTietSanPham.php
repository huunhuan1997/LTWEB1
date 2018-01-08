<?php
	changeTiTle("Chi Tiết Sản Phẩm");
if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$query ="   SELECT lsp.MaLoaiSanPham, sp.GiaSanPham, sp.SoLuongTon, sp.MoTa, sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,sp.TenTacGia,sp.HinhURL,hsx.TenHangSanXuat,lsp.TenLoaiSanPham
                from sanpham sp,hangsanxuat hsx,loaisanpham lsp
                where 	 sp.MaLoaiSanPham = lsp.MaLoaiSanPham 
						and sp.MaHangSanXuat = hsx.MaHangSanXuat
						and  sp.MaSanPham = $id";
	$list = Provider::execQuery($query);
	if (count($list)>0) 
	{
		$row = mysqli_fetch_array($list);
		include("templates/tmpChiTietSanPham.php");
?>	

<div class="clearfix">
	<h2 class="page-header">Sách cùng thể loại</h2>
<?php
		$MaLoai = $row["MaLoaiSanPham"];
		$query = "  SELECT sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,sp.TenTacGia,sp.HinhURL
					from sanpham sp
					where sp.BiXoa = FALSE 
							and sp.MaSanPham <> $id
							and sp.MaLoaiSanPham = $MaLoai
							LIMIT 0, 4";
		$list = Provider::execQuery($query);
		
			if (count($list) > 0) {
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
?>
</div>
<?php
	} 
	else 
	{
		echo "<div class='alert alert-danger'>Không tìm thấy sách này.</div>";
	}
} 
else 
{
	include_once("pages/error.php");
}
?>