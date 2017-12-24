<?php
	$query = "select id, name from category";
	$categories = Database::executeQuery($query);
	$query = "select id, name from publisher";
	$publishers = Database::executeQuery($query);
?>

<ul class="list-group">
	<li class="list-group-item">Giá từ:
		<select class="form-control" name="priceMin">
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
		<select class="form-control" name="priceMax">
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
		<select class="form-control" name="cate">
			<option value="" class="hidden">-- Chọn thể loại --</option>
	<?php
		foreach ($categories as $cate) {
	?>
			<option value="<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></option>
	<?php
		}
	?>
		</select>				
	</li>
	<li class="list-group-item">Nhà xuất bản:
		<select class="form-control" name="pls">
			<option value="" class="hidden">-- Chọn nhà xuất bản --</option>
	<?php
		foreach ($publishers as $pls) {
	?>
			<option value="<?php echo $pls['id']; ?>"><?php echo $pls['name']; ?></option>
	<?php
		}
	?>
		</select>
	</li>
	<li class="list-group-item">Tác giả: <input class="form-control" type="text" name="author"></li>
</ul>