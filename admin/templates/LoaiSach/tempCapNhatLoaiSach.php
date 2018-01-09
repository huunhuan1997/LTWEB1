<?php changeTitle("Cập Nhật Loại Sách"); 
    $MaLoaiSanPham = $_GET['id'];
    $query ="select TenLoaiSanPham from loaisanpham where MaLoaiSanPham = $MaLoaiSanPham";
    $result = Provider::execQuery($query);
    $row = mysqli_fetch_array($result);
?>
<div class="panel">
	<h2 class="page-header text-center">Cập Nhật Loại sách #<?php echo $MaLoaiSanPham; ?></h2>
	<div class="panel-body">
		<form action="index.php?a=18&id=<?php echo $MaLoaiSanPham; ?>" method="post" enctype="multipart/form-data" class="frmEdit w40p center-block">

			Tên Loại: 
			    <input type="text" class="form-control" value="<?php echo $row["TenLoaiSanPham"]; ?>" autofocus ="autofocus" name="TenLoaiSach">
                <br>
                <button type="submit" class="btn btn-primary center-block">Lưu</button>
		</form>
	</div>
</div>