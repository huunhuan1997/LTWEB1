<?php

	$where = "";

	if (!empty($_GET['name'])) {
		$name = $_GET['name'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "name like '%$name%'";
	}

	if (!empty($_GET['number'])) {
		$number = $_GET['number'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "number like '%$number%'";
	}

	if (!empty($_GET['address'])) {
		$address = $_GET['address'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "address like '%$address%'";
	}
?>

<div>
	<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="p" value="listpublisher">
		<div class="input-group">
			<input type="text" class="form-control" name="name" placeholder="Tên NXB" value="<?php echo !empty($name) ? $name : ""; ?>">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="OpenAdvSearch();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item"><input type="text" name="number" class="form-control" placeholder="Hotline" value="<?php echo !empty($number) ? $number : ""; ?>"></li>
				<li class="list-group-item"><input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?php echo !empty($address) ? $address : ""; ?>"></li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?p=addpublisher';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>
</div>
<table class="table table-striped" id="publisherList">
	<tr class="nb active">
		<td>Mã</td>
		<td>Tên</td>
		<td>Hotline</td>
		<td colspan="3">Địa chỉ</td>
	</tr>
	<?php
		$query = "SELECT * from `publisher`";
		$query .= ($where == "") ? "" : " where $where";
		$publishers = Database::executeQuery($query);
		foreach ($publishers as $publisher) {
	?>
	<tr class="record">
		<td><?php echo $publisher['id']; ?></td>
		<td><?php echo $publisher['name']; ?></td>
		<td><?php echo $publisher['number']; ?></td>
		<td><?php echo $publisher['address']; ?></td>
		<td><a href="?p=editpublisher&id=<?php echo $publisher['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="?p=deletepublisher&id=<?php echo $publisher['id']; ?>"><span class="glyphicon glyphicon-<?php echo $publisher['enable'] == 1 ? "remove" : "ok"; ?>"></span></a></td>
	</tr>
	<?php
		}
	?>
</table>
