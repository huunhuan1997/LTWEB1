
<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="a" value="3">
		<div class="input-group">
		<input type="text" class="form-control" name="TenSach" placeholder="Tên sách">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="TimKiemNangCao();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item">
					<select class="form-control" name="TheLoai" id="cbbStatus">
						<option value="" class="hidden">-- Chọn thể loại --</option>
						<?php
                        	$sql = "select TenLoaiSanPham,MaLoaiSanPham from loaisanpham";
                            $result = Provider::execQuery($sql);
                        while($row=mysqli_fetch_array($result))
                        {
							$Ma = $row['MaLoaiSanPham'];
							$Ten = $row['TenLoaiSanPham'];
							echo "<option value='$Ma'";
							echo ">$Ten</option>";
						}
						?>	
					</select>					
				</li>
                <li class="list-group-item">
					<select class="form-control" name="NXB">
						<option value="" class="hidden">-- Chọn NXB --</option>
						<?php
                        	$sql = "select TenHangSanXuat,MaHangSanXuat from hangsanxuat";
                            $result = Provider::execQuery($sql);
                        while($row=mysqli_fetch_array($result))
                        {
							$Ma = $row['MaHangSanXuat'];
							$Ten = $row['TenHangSanXuat'];
							echo "<option value='$Ma'";
							echo ">$Ten</option>";
						}
						?>	
					</select>
				</li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?a=10';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>