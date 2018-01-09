<?php changeTitle("Cập Nhật NXB"); 
    $MaNXB = $_GET['id'];
    $query ="select TenHangSanXuat from hangsanxuat where MaHangSanXuat = $MaNXB";
    $result = Provider::execQuery($query);
    $row = mysqli_fetch_array($result);
?>
<div class="panel">
	<h2 class="page-header text-center">Cập Nhật NXB #<?php echo $MaNXB; ?></h2>
	<div class="panel-body">
		<form action="index.php?a=23&id=<?php echo $MaNXB; ?>" method="post" enctype="multipart/form-data" class="frmEdit w40p center-block">

			Tên NXB: 
			    <input type="text" class="form-control" value="<?php echo $row["TenHangSanXuat"]; ?>" autofocus ="autofocus" name="TenNXB">
                <br>
                <button type="submit" class="btn btn-primary center-block">Lưu</button>
		</form>
	</div>
</div>