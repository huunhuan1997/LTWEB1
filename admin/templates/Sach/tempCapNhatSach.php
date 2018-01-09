<?php
    changeTitle('Cập Nhật Sách');
	$MaSanPham = $_GET['id'];
    $query = "select TenSanPham,TenTacGia,MaLoaiSanPham,MaHangSanXuat,GiaSanPham,MoTa,SoLuongTon,HinhURL 
                from sanpham 
                where MaSanPham = $MaSanPham";
	$sanpham = Provider::execQuery($query);
    $rowSP = mysqli_fetch_array($sanpham);

		$query = "select TenLoaiSanPham,MaLoaiSanPham from loaisanpham";
        $loaisanpham = Provider::execQuery($query);
		$query = "select TenHangSanXuat,MaHangSanXuat from hangsanxuat";
		$hangsanxuat = Provider::execQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa sách #<?php echo $MaSanPham; ?></h2>
	<div class="panel-body">
		<div class="w40p thumbnail pull-left" id="productImg">
			<img src="../images/Product/<?php echo $rowSP['HinhURL']; ?>" alt="<?php echo $rowSP['TenSanPham']; ?>">
		</div>
		<div class="w40p pull-right" id="productInfo">
			<form action="index.php?a=11&id=<?php echo $MaSanPham; ?>" method="post" enctype="multipart/form-data" class="frmEdit">
				Tên: 
				<input type="text" class="form-control" name="TenSanPham" value="<?php echo $rowSP['TenSanPham']; ?>">
				Tác giả: 
				<input type="text" class="form-control" name="TenTacGia" value="<?php echo $rowSP['TenTacGia']; ?>">
				Thể loại: 
				<select class="form-control" name="LoaiSanPham">
					<option value="" class="hidden">-- Chọn thể loại --</option>
					<?php
					 while($row=mysqli_fetch_array($loaisanpham))
                     {
                         $Ma = $row['MaLoaiSanPham'];
                         $Ten = $row['TenLoaiSanPham'];
                         echo "<option value='$Ma'";
                         echo $Ma == $rowSP['MaLoaiSanPham'] ? " selected='selected'" : "";
                         echo ">$Ten</option>";
                     }
					?>	
				</select>
				Nhà xuất bản: 
				<select class="form-control" name="NXB">
					<option value="" class="hidden">-- Chọn NXB --</option>
					<?php
					while($row=mysqli_fetch_array($hangsanxuat))
                    {
                        $Ma = $row['MaHangSanXuat'];
                        $Ten = $row['TenHangSanXuat'];
                        echo "<option value='$Ma'";
                        echo $Ma == $rowSP['MaHangSanXuat'] ? " selected='selected'" : "";
                        echo ">$Ten</option>";
                    }
					?>	
				</select>
				Giá: 
				<input type="text" class="form-control" name="GiaSanPham" value="<?php echo $rowSP['GiaSanPham']; ?>">
				Mô tả: 
				<textarea name="MoTa" rows="3" class="form-control"><?php echo $rowSP['MoTa']; ?></textarea>
				Số lượng:
				<input type="text" class="form-control" name="SoLuongTon" value="<?php echo $rowSP['SoLuongTon']; ?>">
				Hình ảnh: 
				<input type="file" class="form-control" name="HinhURL">
				<br>
				<button type="submit" class="btn btn-primary center-block">Sửa</button>
			</form>
		</div>
	</div>
</div>