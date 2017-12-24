<?php
	$query = "SELECT id, name from `category`";
	$sttcate = Database::executeQuery($query);
	$query = "SELECT id, name from `publisher`";
	$sttpls = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Thêm sách</h2>
	<div class="panel-body">
		<form action="libs/handling/addproduct.php" method="post" enctype="multipart/form-data" class="frmEdit w40p center-block">
			Tên: 
			<input type="text" class="form-control" name="name">
			Tác giả: 
			<input type="text" class="form-control" name="author">
			Thể loại: 
			<select class="form-control" name="category">
				<option value="" class="hidden">-- Chọn thể loại --</option>
				<?php
				foreach ($sttcate as $stt) {
					$sid = $stt['id'];
					$sn = $stt['name'];
					echo "<option value='$sid'>$sn</option>";
				}
				?>	
			</select>
			Nhà xuất bản: 
			<select class="form-control" name="publisher">
				<option value="" class="hidden">-- Chọn NXB --</option>
				<?php
				foreach ($sttpls as $stt) {
					$sid = $stt['id'];
					$sn = $stt['name'];
					echo "<option value='$sid'>$sn</option>";
				}
				?>	
			</select>
			Giá: 
			<input type="text" class="form-control" name="price">
			Mô tả: 
			<textarea name="description" rows="3" class="form-control"></textarea>
			Số lượng:
			<input type="text" class="form-control" name="count">
			Hình ảnh: 
			<input type="file" class="form-control" name="img">
			<button type="submit" class="btn btn-primary center-block">Thêm</button>
		</form>
	</div>
</div>