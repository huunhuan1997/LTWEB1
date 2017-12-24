<?php
	if (!isset($_GET['id'])) {
		redirect("p=error");
	}

	$id = $_GET['id'];
	$query = "SELECT * from `category` where id = $id";
	$cate = Database::first($query);

	if ($cate != -1) {
?>

<div class="panel">
	<h2 class="page-header text-center">Sửa thể loại #<?php echo $id; ?></h2>
	<div class="panel-body">
		<form action="libs/handling/updatecate.php?id=<?php echo $id; ?>" method="post" class="frmEdit w40p center-block">
			Tên thể loại: 
			<input type="text" value="<?php echo $cate['name']; ?>" class="form-control" name="name">
			Mô tả: 
			<textarea name="description" class="form-control" rows="5"><?php echo $cate['description']; ?></textarea>
			<button type="submit" class="btn btn-primary center-block">Sửa</button>
		</form>
	</div>
</div>

<?php
 	}
?>