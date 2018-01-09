<td colspan="5">
			<table class="table nb">
				<tr class="active">
					<td>Mã sách</td>
					<td>Tên sách</td>
					<td>Tác giả</td>
					<td>Giá</td>
					<td>Số lượng</td>
				</tr>
                <?php while($row = mysqli_fetch_array($ChiTiet)) { ?>
				<tr>
					<td><?php echo $row['MaSanPham']; ?></td>
					<td><?php echo $row['TenSanPham']; ?></td>
					<td><?php echo $row['TenTacGia']; ?></td>
					<td><?php echo $row['GiaSanPham']; ?></td>
					<td><?php echo $row['SoLuong']; ?></td>
				</tr>
				<?php } ?>
			</table>
</td>