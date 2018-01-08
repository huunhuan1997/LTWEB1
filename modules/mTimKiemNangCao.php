<?php
	$query = "select MaLoaiSanPham, TenLoaiSanPham from loaisanpham";
	$LoaiSanPham = Provider::execQuery($query);
	$query = "select MaHangSanXuat, TenHangSanXuat from hangsanxuat";
	$NhaXuatBan = Provider::execQuery($query);
?>

<ul class="list-group">
	<li class="list-group-item">Giá từ:
		<select class="form-control" name="GiaTu">
	<?php
		for ($i=15000; $i < 200000; $i += 25000) { 
	?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php
		}
	?>
		</select>			
	</li>
	<li class="list-group-item">Đến:
		<select class="form-control" name="GiaDen">
	<?php
		for ($i=200000; $i >= 15000; $i -= 25000) { 
	?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php
		}
	?>
		</select>			
	</li>
	<li class="list-group-item">Thể loại:
		<select class="form-control" name="TheLoai">
			<option value="" class="hidden">-- Chọn thể loại --</option>
	<?php
		while ($row = mysqli_fetch_array($LoaiSanPham)) {
	?>
			<option value="<?php echo $row['MaLoaiSanPham']; ?>"><?php echo $row['TenLoaiSanPham']; ?></option>
	<?php
		}
	?>
		</select>				
	</li>
	<li class="list-group-item">Nhà xuất bản:
		<select class="form-control" name="NXB">
			<option value="" class="hidden">-- Chọn nhà xuất bản --</option>
	<?php
		while ($row = mysqli_fetch_array($NhaXuatBan)) {
	?>
			<option value="<?php echo $row['MaHangSanXuat']; ?>"><?php echo $row['TenHangSanXuat']; ?></option>
	<?php
		}
	?>
		</select>
	</li>
	<li class="list-group-item">Tác giả: <input class="form-control" type="text" name="TacGia"></li>
</ul>