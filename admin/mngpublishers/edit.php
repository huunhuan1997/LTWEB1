<?php
	if (!isset($_GET['id'])) {
		redirect("p=error");
	}

	$id = $_GET['id'];
	$query = "SELECT * from `publisher` where id = $id";
	$publisher = Database::first($query);

	if ($publisher != -1) {
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa nhà xuất bản #<?php echo $id; ?></h2>
	<div class="panel-body">
		<form action="libs/handling/updatepublisher.php?id=<?php echo $id; ?>" method="post" class="frmEdit w40p center-block">
			Tên nhà xuất bản: 
			<input type="text" value="<?php echo $publisher['name']; ?>" class="form-control" name="name">
			Hotline: 
			<input type="text" value="<?php echo $publisher['number']; ?>" class="form-control" name="number">
			Địa chỉ: 
			<input type="text" value="<?php echo $publisher['address']; ?>" class="form-control" name="address">
			<button type="submit" class="btn btn-primary center-block">Sửa</button>
		</form>
	</div>
</div>

<?php
	}
?>