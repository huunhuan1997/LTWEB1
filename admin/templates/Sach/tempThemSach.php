<?php
	changeTitle('Thêm Sách');
	$query = "SELECT MaLoaiSanPham,TenLoaiSanPham  from loaisanpham";
	$loaisanpham = Provider::execQuery($query);
	$query = "SELECT MaHangSanXuat,TenHangSanXuat from hangsanxuat";
	$hangsanxuat = Provider::execQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Thêm sách</h2>
	<div class="panel-body">
		<form action="index.php?a=13" method="post" enctype="multipart/form-data" class="frmEdit w40p center-block">
			Tên: 
			    <input type="text" class="form-control" name="TenSanPham">
			Tác giả: 
			    <input type="text" class="form-control" name="TenTacGia">
			Thể loại: 
			<select class="form-control" name="LoaiSanPham">
				<option value="" class="hidden">-- Chọn thể loại --</option>
				<?php
                    while($row = mysqli_fetch_array($loaisanpham)) 
                    {
                        $Ma = $row['MaLoaiSanPham'];
						$Ten = $row['TenLoaiSanPham'];
                        echo "<option value='$Ma'";
						echo "selected='selected'";
						echo  ">$Ten</option>";
                    }
                    ?>	
			</select>
			Nhà xuất bản: 
			<select class="form-control" name="NXB">
				<option value="" class="hidden">-- Chọn NXB --</option>
				<?php
				while($row = mysqli_fetch_array($hangsanxuat)) {
					$Ma = $row['MaHangSanXuat'];
					$Ten = $row['TenHangSanXuat'];
					echo "<option value='$Ma'";
					echo "selected='selected'";
					echo  ">$Ten</option>";
				}
				?>	
			</select>
			Giá: 
			<input type="text" class="form-control" name="GiaSanPham">
			Mô tả: 
			<textarea name="MoTa" rows="3" class="form-control"></textarea>
			Số lượng:
			<input type="text" class="form-control" name="SoLuongTon">
			Hình ảnh: 
			<input type="file" class="form-control" name="HinhURL">
			<br>
			<button type="submit" class="btn btn-primary center-block">Thêm</button>
		</form>
	</div>
</div>