<td><?php echo $row['MaLoaiSanPham']; ?></td>
<td><?php echo $row['TenLoaiSanPham']; ?></td>
<td><a href="index.php?a=17&id=<?php echo $row['MaLoaiSanPham']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
<td><a href="index.php?a=16&id=<?php echo $row['MaLoaiSanPham']; ?>&BiXoa=<?php echo $row['BiXoa']; ?>"><span class="glyphicon glyphicon-<?php echo $row['BiXoa'] == 0 ? "remove" : "ok"; ?>"></span></a></td>