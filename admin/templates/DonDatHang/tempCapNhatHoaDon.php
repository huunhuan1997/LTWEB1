<?php
	changeTitle("Cập nhật đơn đặt hàng");
	if (!isset($_GET['id'])) {
		Provider::ChangeURL('index.php?a=0');
	}

	$MaDonDatHang = $_GET['id'];
	$query = "SELECT d.MaDonDatHang,d.MaTaiKhoan,d.TongThanhTien,d.MaTinhTrang,t.TenTinhTrang,d.NgayLap
                from dondathang d,tinhtrang t
                where d.MaTinhTrang = t.MaTinhTrang
                and d.MaDonDatHang = $MaDonDatHang";
    $result = Provider::execQuery($query);
    $row = mysqli_fetch_array($result);
?>
<div class="panel">
	<h2 class="page-header text-center">Sửa đơn đặt hàng #<?php echo $MaDonDatHang; ?></h2>
	<div class="panel-body">
		<form action="index.php?a=8&id=<?php echo $MaDonDatHang; ?>" method="post" class="frmEdit w40p center-block">
			Ngày tạo: 
			<input type="datetime-local" class="form-control" name="NgayLap" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['NgayLap'])); ?>">
			Mã khách hàng: 
			<input type="text" class="form-control" placeholder="Mã KH" name="MaKhachHang" value="<?php echo $row['MaTaiKhoan']; ?>">
			Tổng tiền: 
			<input type="text" class="form-control" placeholder="Tổng tiền" name="TongThanhTien" value="<?php echo $row['TongThanhTien']; ?>">
			Trạng thái: 
			<select class="form-control" name="TrangThai" id="cbbStatus">
				<option value="" class="hidden">-- Chọn trạng thái --</option>
				<?php
                    $sql = "select MaTinhTrang,TenTinhTrang from tinhtrang";
                    $result = Provider::execQuery($sql);
                    while($row2=mysqli_fetch_array($result))
                    {
                        $Ma = $row2['MaTinhTrang'];
                        $Ten = $row2['TenTinhTrang'];
                        echo "<option value='$Ma'";
                        echo ($Ma == $row['MaTinhTrang']) ? "selected='selected'" : "";
                        echo ">$Ten</option>";
                    }
                    ?>	
				?>	
			</select>
			<br>
			<button type="submit" class="btn btn-primary center-block">Sửa</button>
		</form>
	</div>
</div>