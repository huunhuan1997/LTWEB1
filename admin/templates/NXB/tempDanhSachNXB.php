<td><?php echo $row['MaHangSanXuat']; ?></td>
<td><?php echo $row['TenHangSanXuat']; ?></td>
<td><a href="index.php?a=22&id=<?php echo $row['MaHangSanXuat']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
<td><a href="index.php?a=21&id=<?php echo $row['MaHangSanXuat']; ?>&BiXoa=<?php echo $row['BiXoa']; ?>"><span class="glyphicon glyphicon-<?php echo $row['BiXoa'] == 0 ? "remove" : "ok"; ?>"></span></a></td>