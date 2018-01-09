<?php
    changeTitle('Quản lý nhà xuất bản');
    $query ="select MaHangSanXuat,TenHangSanXuat,BiXoa from hangsanxuat ";

         if(!empty($_GET['TenNXB']))
         {
            $TenHangSanXuat = $_GET['TenNXB'];
             $query = $query. "where  TenHangSanXuat like '%$TenHangSanXuat%'";
         }  
?>

<div>
	<?php include('templates/NXB/tempTimKiemNXB.php'); ?>
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
		<?php 	include('templates/NXB/tempDanhSachNXB.php'); ?> 
	</tr>
	<?php
		}
	?>
</table>