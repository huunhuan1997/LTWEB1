<?php
    changeTitle('Quản lý sách');
    $query ="select sp.BiXoa, sp.HinhURL, sp.MaSanPham,sp.TenSanPham,sp.TenTacGia,lsp.TenLoaiSanPham,hsx.TenHangSanXuat,sp.MaLoaiSanPham,sp.MaHangSanXuat,sp.GiaSanPham,sp.SoLuongTon
            from sanpham sp,hangsanxuat hsx,loaisanpham lsp
            where sp.MaHangSanXuat = hsx.MaHangSanXuat 
			and sp.MaLoaiSanPham = lsp.MaLoaiSanPham";

         if(!empty($_GET['TenSach']))
         {
            $TenSach = $_GET['TenSach'];
             $query = $query. " and sp.TenSanPham like '%$TenSach%'";
         }
         if(!empty($_GET['TheLoai']))
         {
            $TheLoai = $_GET['TheLoai'];
            $query = $query . " and sp.MaLoaiSanPham = $TheLoai";
         }
         if(!empty($_GET['NXB']))
         {
            $NXB = $_GET['NXB'];
             $query = $query. " and sp.MaHangSanXuat = $NXB";
         }       
?>

<div>
	<?php include('templates/Sach/tempTimKiemSach.php'); ?>
</div>
<table class="table table-striped" id="orderList">
	<tr class="nb active">
        <td>Tên</td>
        <td>Tác giả</td>
        <td>Thể loại</td>
        <td>NXB</td>
        <td>Giá</td>
        <td colspan="3">Số lượng</td>
	</tr>
	<?php
		$SanPham = Provider::execQuery("$query");
        while($row = mysqli_fetch_array($SanPham))
        {
	?>
	<tr>
		<?php 	include('templates/Sach/tempDSSach.php'); ?> 
	</tr>
	<?php
		}
	?>
</table>