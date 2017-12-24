<?php
	if (!isset($_GET['id'])) {
		redirect("p=error");
	}

	$id = $_GET['id'];
	$query = "SELECT * from `product` where id = $id";
	$pd = Database::first($query);

	if ($pd != -1) {

		$query = "SELECT id, name from `category`";
		$sttcate = Database::executeQuery($query);
		$query = "SELECT id, name from `publisher`";
		$sttpls = Database::executeQuery($query);
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa sách #<?php echo $id; ?></h2>
	<div class="panel-body">
		<div class="w40p thumbnail pull-left" id="productImg">
			<img src="../imgs/product/<?php echo $pd['img']; ?>" alt="<?php echo $pd['name']; ?>">
		</div>
		<div class="w40p pull-right" id="productInfo">
			<form action="libs/handling/updateproduct.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="frmEdit">
				Tên: 
				<input type="text" class="form-control" name="name" value="<?php echo $pd['name']; ?>">
				Tác giả: 
				<input type="text" class="form-control" name="author" value="<?php echo $pd['author']; ?>">
				Thể loại: 
				<select class="form-control" name="category">
					<option value="" class="hidden">-- Chọn thể loại --</option>
					<?php
					foreach ($sttcate as $stt) {
						$sid = $stt['id'];
						$sn = $stt['name'];
						echo "<option value='$sid'";
						echo $sid == $pd['category'] ? " selected='selected'" : "";
						echo ">$sn</option>";
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
						echo "<option value='$sid'";
						echo $sid == $pd['publisher'] ? " selected='selected'" : "";
						echo ">$sn</option>";
					}
					?>	
				</select>
				Giá: 
				<input type="text" class="form-control" name="price" value="<?php echo $pd['price']; ?>">
				Mô tả: 
				<textarea name="description" rows="3" class="form-control"><?php echo $pd['description']; ?></textarea>
				Số lượng:
				<input type="text" class="form-control" name="count" value="<?php echo $pd['count']; ?>">
				Hình ảnh: 
				<input type="file" class="form-control" name="img">
				<button type="submit" class="btn btn-primary center-block">Sửa</button>
			</form>
		</div>
	</div>
</div>

<?php
	}
?>