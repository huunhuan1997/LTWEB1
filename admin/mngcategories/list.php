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

<div>
	<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="p" value="listcate">
		<input type="text" class="form-control" name="name" placeholder="Tên sách" value="<?php echo !empty($name) ? $name : ""; ?>">
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?p=addcate';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>
</div>
<table class="table table-striped" id="cateList">
	<tr class="nb active">
		<td>Mã</td>
		<td>Tên</td>
		<td colspan="3">Mô tả</td>
	</tr>
	<?php
		$query = "SELECT * from `category`";
		$query .= $where == "" ? "" : " where $where";
		$categories = Database::executeQuery($query);
		foreach ($categories as $cate) {
	?>
	<tr>
		<td><?php echo $cate['id']; ?></td>
		<td><?php echo $cate['name']; ?></td>
		<td><?php echo $cate['description']; ?></td>
		<td><a href="?p=editcate&id=<?php echo $cate['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="?p=deletecate&id=<?php echo $cate['id']; ?>"><span class="glyphicon glyphicon-<?php echo $cate['enable'] == 1 ? "remove" : "ok"; ?>"></span></a></td>
	</tr>
	<?php
		}
	?>
</table>