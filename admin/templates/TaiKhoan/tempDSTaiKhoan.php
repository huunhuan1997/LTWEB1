<td><?php echo $row['MaTaiKhoan']; ?></td>
<td><?php echo $row['TenDangNhap']; ?></td>
<td><?php echo $row['TenLoaiTaiKhoan']?></td>
<td><?php echo $row['TenHienThi']; ?></td>
<td><?php echo $row['DienThoai']; ?></td>
<td><?php echo $row['DiaChi']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><a href="index.php?a=27&id=<?php echo $row['MaTaiKhoan']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
<td><a href="index.php?a=26&id=<?php echo $row['MaTaiKhoan']; ?>&BiXoa=<?php echo $row['BiXoa']; ?>"><span class="glyphicon glyphicon-<?php echo $row['BiXoa'] == 0 ? "remove" : "ok"; ?>"></span></a></td>