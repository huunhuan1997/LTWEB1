<?php
	$sql = "select MaTinhTrang,TenTinhTrang from tinhtrang";
	$result = Provider::execQuery($sql);
 ?>
<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="a" value="2">
		<div class="input-group">
			<input type="date" class="form-control" name="ChonNgay">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="TimKiemNangCao();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item"><input type="text" class="form-control" placeholder="Mã Khách Hàng" name="MaKhachHang" ></li>
				<li class="list-group-item">
					<select class="form-control" name="TrangThai" id="cbbStatus">
						<option value="" class="hidden">-- Chọn trạng thái --</option>
						<?php
                        while($row=mysqli_fetch_array($result))
                        {
							$Ma = $row['MaTinhTrang'];
							$Ten = $row['TenTinhTrang'];
							echo "<option value='$Ma'";
							echo ">$Ten</option>";
						}
						?>	
					</select>					
				</li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
	</form>