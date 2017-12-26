<div class="clearfix" id="productDetail">
	<div class="w40p thumbnail pull-left">
		<img src="images/product/<?php echo $row['HinhURL']; ?>" alt="<?php echo $row['TenSanPham']; ?>">
	</div>
	<div class="w60p pull-right">
		<ul>
			<li class="list-group-item"><h2><?php echo $row['TenSanPham']; ?></h2></li>
			<li class="list-group-item"><B>Tác giả:</B> <?php echo $row['TenTacGia']; ?></li>
			<li class="list-group-item"><B>Nhà xuất bản:</b> <?php echo $row['TenHangSanXuat']; ?></li>
			<li class="list-group-item"><b>Thể loại: </b><?php echo $row['TenLoaiSanPham']; ?></li>
			<li class="list-group-item"><b>Giới thiệu:</b> <?php echo $row['MoTa']; ?></li>
			<li class="list-group-item"><b>Số lượng còn:</b> <?php echo $row['SoLuongTon']; ?> quyển</li>
			<li class="list-group-item"><h4>Giá: <span class="price"><?php echo number_format($row['GiaSanPham']); ?> VNĐ</span></h4></li>
			<li class="list-group-item">
			<?php 
			if(isset($_SESSION["MaTaiKhoan"]))
			{
				?>
					<button class="btn btn-danger" onclick="AddToCart(<?php echo $id . ", " . $row['SoLuongTon']; ?>);">Đặt vào giỏ hàng</button>
					Số lượng: <input type="text" value="1" class="list-group-item" name="txtQuantity" id="txtQuantity">
				<?php
			}
			?>
				
			</li>
		</ul>
	</div>
</div>