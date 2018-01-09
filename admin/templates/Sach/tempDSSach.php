<td><?php echo $row['TenSanPham']; ?></td>
<td><?php echo $row['TenTacGia']; ?></td>
<td><?php echo $row['TenLoaiSanPham']?></td>
<td><?php echo $row['TenHangSanXuat']; ?></td>
<td><?php echo $row['GiaSanPham']; ?></td>
<td><?php echo $row['SoLuongTon']; ?></td>
<td><a href="index.php?a=9&id=<?php echo $row['MaSanPham']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
<td><a href="index.php?a=12&id=<?php echo $row['MaSanPham']; ?>&BiXoa=<?php echo $row['BiXoa']; ?>"><span class="glyphicon glyphicon-<?php echo $row['BiXoa'] == 0 ? "remove" : "ok"; ?>"></span></a></td>