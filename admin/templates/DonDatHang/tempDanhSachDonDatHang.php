<td><?php echo $row['MaDonDatHang']; ?></td>
<td><?php echo $row['MaTaiKhoan']; ?></td>
<td><?php echo number_format($row['TongThanhTien']); ?></td>
<td><?php echo $row['NgayLap']; ?></td>
<td><?php echo $row['TenTinhTrang']; ?></td>
<td><a href="index.php?a=7&id=<?php echo $row['MaDonDatHang']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
<td><a onclick="OpenOrderDetail(<?php echo $row['MaDonDatHang']; ?>);"><span class="glyphicon glyphicon-th-list"></span></a></td>