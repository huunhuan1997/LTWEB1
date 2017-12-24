<?php

	$where = "";

	if (!empty($_GET['name'])) {
		$name = $_GET['name'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "name like '%$name%'";
	}

	if (!empty($_GET['description'])) {
		$description = $_GET['description'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "description like '%$description%'";
	}
?>

<div class="clearfix">
	<span class="lead">Quản lý danh mục</span>
</div>
<div class="clearfix filter">
	<input type="text" class="form-control name" value="<?php echo !empty($name) ? $name : "" ?>" placeholder="Tên danh mục">
	<input type="text" class="form-control description" value="<?php echo !empty($description) ? $description : "" ?>" placeholder="Mô tả">
	<button class="btn btn-default btnSearchCate">Tìm</button>
	<button class="btn btn-default btnAddCate">Thêm</button>
</div>
<table class="table table-striped" id="cateList">
	<tr class="nb active">
		<td>Mã</td>
		<td>Tên</td>
		<td colspan="3">Mô tả</td>
	</tr>
	<?php
		$query = "SELECT * from `category` where enable = 1";
		$query .= $where == "" ? "" : " and $where";
		$categories = $DATABASE->executeQuery($query);
		foreach ($categories as $cate) {
	?>
	<tr>
		<td class="cateid"><?php echo $cate['id']; ?></td>
		<td><input type="text" class="form-control name" value="<?php echo $cate['name']; ?>"></td>
		<td><input type="text" class="form-control description" value="<?php echo $cate['description']; ?>"></td>
		<td><button class="btn btn-success btnUpdateCate"><span class="glyphicon glyphicon-pencil"></span></button></td>
		<td><button class="btn btn-info btnDelCate"><span class="glyphicon glyphicon-remove"></span></button></td>
	</tr>
	<?php
		}
	?>
</table>