<?php
    changeTitle('Quản lý loại sách');
    $query ="select MaLoaiSanPham,TenLoaiSanPham,BiXoa from loaisanpham ";

         if(!empty($_GET['TenLoaiSanPham']))
         {
            $TenLoaiSanPham = $_GET['TenLoaiSanPham'];
             $query = $query. "where  TenLoaiSanPham like '%$TenLoaiSanPham%'";
         }  
?>

<div>
	<?php include('templates/LoaiSach/tempTimKiemLoaiSach.php'); ?>
</div>
<table class="table table-striped" id="orderList">
	<tr class="nb active">
        <td>Mã Loại</td>
        <td colspan="3">Tên Loại</td>
	</tr>
	<?php
		$Loai = Provider::execQuery("$query");
        while($row = mysqli_fetch_array($Loai))
        {
	?>
	<tr>
		<?php 	include('templates/LoaiSach/tempDSSLoaiSach.php'); ?> 
	</tr>
	<?php
		}
	?>
</table>