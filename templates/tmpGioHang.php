
<form action="index.php?a=13" method="POST" name="frmGioHang">
		<tr>
			<td width="20%">
				<input type="hidden" name="MaSanPham" value="<?php echo $MaSanPham; ?>">
				<?php include("templates/HienThiDSSach.php"); ?>
			</td>
			<td><input type="text" class="form-control wA" name="txtSoLuong" id="txtSoLuong" value="<?php echo $SoLuong; ?>"></td>
			<td><button type="submit" name="action" value="CapNhat" class="btn btn-success" onclick="return KiemTraCapNhat(<?php echo $SoLuongTon; ?>)">Cập nhật</button></td>
			<td><button type="submit" name="action" value="Huy" class="btn btn-info">Hủy</button></td>
		</tr>
</form><script>


</script>