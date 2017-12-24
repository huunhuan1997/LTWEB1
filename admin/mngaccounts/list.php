<?php

	$where = "";

	if (!empty($_GET['username'])) {
		$username = $_GET['username'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.username = '$username'";
	}

	if (!empty($_GET['email'])) {
		$email = $_GET['email'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.email = '$email'";
	}

	if (!empty($_GET['loaind'])) {
		$loaind = $_GET['loaind'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.loaind = $loaind";
	}

	if (!empty($_GET['hoten'])) {
		$hoten = $_GET['hoten'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.hoten like '%$hoten%'";
	}

	if (!empty($_GET['ngaysinh'])) {
		$ngaysinh = $_GET['ngaysinh'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.ngaysinh = '$ngaysinh'";
	}

	if (!empty($_GET['diachi'])) {
		$diachi = $_GET['diachi'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "u.diachi like '%$diachi%'";
	}

	$query = "SELECT id, ten from `user_types`";
	$usertypes = Database::executeQuery($query);
?>

<div>
	<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="p" value="listaccount">
		<div class="input-group">
			<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo !empty($username) ? $username : ""; ?>">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="OpenAdvSearch();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item">
					<select class="form-control" name="status" id="cbbStatus">
						<option value="" class="hidden">-- Chọn loại tài khoản --</option>
						<?php
						foreach ($usertypes as $stt) {
							$sid = $stt['id'];
							$sn = $stt['ten'];
							echo "<option value='$sid'";
							echo ($sid == (isset($loaind) ? $loaind : -1)) ? "selected='selected'" : "";
							echo ">$sn</option>";
						}
						?>	
					</select>
				</li>
				<li class="list-group-item"><input type="text" class="form-control" value="ten" placeholder="Họ tên" value="<?php echo !empty($hoten) ? $hoten : ""; ?>"></li>
				<li class="list-group-item"><input type="date" class="form-control" value="ngaysinh" value="<?php echo !empty($ngaysinh) ? date("Y-m-d", strtotime($ngaysinh)) : ""; ?>"></li>
				<li class="list-group-item"><input type="text" class="form-control" value="diachi" placeholder="Địa chỉ" value="<?php echo !empty($diachi) ? $diachi : ""; ?>"></li>
				<li class="list-group-item"><input type="email" class="form-control" value="email" placeholder="Email" value="<?php echo !empty($email) ? $email : ""; ?>"></li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?p=addaccount';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>
</div>
<table class="table table-striped" id="accList">
	<tr class="nb active">
		<td>Mã</td>
		<td>Username</td>
		<td>Loại ND</td>
		<td>Tên</td>
		<td>Ngày sinh</td>
		<td>Địa chỉ</td>
		<td colspan="3">Email</td>
	</tr>
	<?php
		$query = "SELECT u.*, ut.ten from users u, user_types ut where u.loaind = ut.id";
		$query .= $where == "" ? "" : " and $where";
		$users = Database::executeQuery($query);
		foreach ($users as $user) {
	?>
	<tr>
		<td><?php echo $user['id']; ?></td>
		<td><?php echo $user['username']; ?></td>
		<td><?php echo $user['ten']; ?></td>
		<td><?php echo $user['hoten']; ?></td>
		<td><?php echo date("Y-m-d", strtotime($user['ngaysinh'])); ?></td>
		<td><?php echo $user['diachi']; ?></td>
		<td><?php echo $user['email']; ?></td>
		<td><a href="?p=editaccount&id=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="?p=deleteaccount&id=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-<?php echo $user['enable'] == 1 ? "remove" : "ok"; ?>"></span></a></td>
	</tr>
	<?php
		}
	?>
</table>