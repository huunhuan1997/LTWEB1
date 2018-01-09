<?php
    changeTitle('Quản lý đơn đặt hàng');
    $query ="SELECT D.MaDonDatHang,D.MaTaiKhoan,D.MaTinhTrang,T.TenTinhTrang,D.NgayLap,D.TongThanhTien
            from dondathang D,tinhtrang T
            where D.MaTinhTrang = T.MaTinhTrang ";

         if(!empty($_GET['MaKhachHang']))
         {
            $MaKhachHang = $_GET['MaKhachHang'];
             $query = $query. " and D.MaTaiKhoan = $MaKhachHang";
         }
         if(!empty($_GET['ChonNgay']))
         {
            $ChonNgay = date("Y-m-d", strtotime($_GET['ChonNgay']));
             $query = $query. " and D.NgayLap like '$ChonNgay%'";
         }
         if(!empty($_GET['TrangThai']))
         {
            $TrangThai = $_GET['TrangThai'];
             $query = $query. "and D.MaTinhTrang = $TrangThai";
         }       
?>

<div>
	<?php include('templates/DonDatHang/tempTimKiemDonHang.php'); ?>
</div>
<table class="table table-striped" id="orderList">
	<tr class="nb active">
		<td>Mã Đơn Hàng</td>
		<td>Mã Khách Hàng</td>
		<td>Tổng tiền</td>
		<td>Ngày lập đơn</td>
		<td colspan="4">Trạng thái</td>
	</tr>
	<?php
		$DonDatHang = Provider::execQuery("$query");
        while($row = mysqli_fetch_array($DonDatHang))
        {
	?>
	<tr>
		<?php 	include('templates/DonDatHang/tempDanhSachDonDatHang.php'); ?> 
	</tr>
	<tr class="hidden" id="ChiTietDonDatHang<?php echo $row['MaDonDatHang']; ?>">
        <?php
            $MaDonDatHang = $row['MaDonDatHang'];
            $query = "SELECT CT.MaSanPham,s.TenSanPham,s.TenTacGia,s.GiaSanPham,CT.SoLuong
                        from chitietdondathang CT,sanpham s
                        where s.MaSanPham = CT.MaSanPham
                        and CT.MaDonDatHang = $MaDonDatHang"; 
            $ChiTiet = Provider::execQuery("$query");
                include('templates/DonDatHang/tempChiTietDonDatHang.php');
        ?>
	</tr>
	<?php
		}
	?>
</table>
<script>
    function OpenOrderDetail(MaDonDatHang) {
	$("#ChiTietDonDatHang" + MaDonDatHang).toggleClass("hidden");
}
</script>