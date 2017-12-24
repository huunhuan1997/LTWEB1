<?php

	$where = "";

	if (!empty($_GET['category'])) {
		$category = $_GET['category'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.category = $category";
	}

	if (!empty($_GET['name'])) {
		$name = $_GET['name'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.name like '%$name%'";
	}

	if (!empty($_GET['author'])) {
		$author = $_GET['author'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.author like '%$author%'";
	}

	if (!empty($_GET['publisher'])) {
		$publisher = $_GET['publisher'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.publisher = $publisher";
	}

	if (!empty($_GET['price'])) {
		$price = $_GET['price'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.price = $price";
	}

	if (!empty($_GET['count'])) {
		$count = $_GET['count'];
		$where .= ($where == "") ? "" : "and ";
		$where .= "pd.count = $count%";
	}

	$query = "SELECT id, name from `category`";
	$cate = Database::executeQuery($query);
	$query = "SELECT id, name from `publisher`";
	$pls = Database::executeQuery($query);
?>

<div>
	<form action="index.php" method="get" class="navbar-form pull-right" id="searchBox">
		<input type="hidden" name="p" value="listproduct">
		<div class="input-group">
			<input type="text" class="form-control" name="name" placeholder="Tên sách" value="<?php echo !empty($name) ? $name : ""; ?>">
			<span class="input-group-btn">
				<button type="button" class="btn btn-default" onclick="OpenAdvSearch();">Tuỳ chọn</button>
  			</span>
		</div>
		<div id="advSearch">
			<ul class="list-group">
				<li class="list-group-item">
					<select class="form-control" name="category">
						<option value="" class="hidden">-- Chọn thể loại --</option>
						<?php
						foreach ($cate as $stt) {
							$sid = $stt['id'];
							$sn = $stt['name'];
							echo "<option value='$sid'";
							echo ($sid == (isset($category) ? $category : -1)) ? "selected='selected'" : "";
							echo ">$sn</option>";
						}
						?>	
					</select>
				</li>
				<li class="list-group-item"><input type="text" class="form-control" name="author" placeholder="Tác giả" value="<?php echo !empty($author) ? $author : ""; ?>"></li>
				<li class="list-group-item"><input type="text" class="form-control" name="price" placeholder="Giá" value="<?php echo !empty($price) ? $price : ""; ?>"></li>
				<li class="list-group-item"><input type="text" class="form-control" name="count" placeholder="Số lượng" value="<?php echo !empty($count) ? $count : ""; ?>"></li>
				<li class="list-group-item">
					<select class="form-control" name="publisher">
						<option value="" class="hidden">-- Chọn NXB --</option>
						<?php
						foreach ($pls as $stt) {
							$sid = $stt['id'];
							$sn = $stt['name'];
							echo "<option value='$sid'";
							echo ($sid == (isset($publisher) ? $publisher : -1)) ? "selected='selected'" : "";
							echo ">$sn</option>";
						}
						?>	
					</select>
				</li>
			</ul>
		</div>
		<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
		<button type="button" class="btn" onclick="window.location.href = 'index.php?p=addproduct';"><span class="glyphicon glyphicon-plus"></span></button>
	</form>
</div>
<table class="table table-striped">
	<tr class="nb active">
		<td>Ảnh</td>
		<td>Tên</td>
		<td>Tác giả</td>
		<td>Thể loại</td>
		<td>NXB</td>
		<td>Giá</td>
		<td colspan="3">Số lượng</td>
	</tr>
	<?php
		$query = "SELECT pd.*, g.name as cateName, pls.name as plsName from product pd, category g, publisher pls where pd.category = g.id and pd.publisher = pls.id";
		$query .= $where == "" ? "" : " and $where";
		$products = Database::executeQuery($query);
		foreach ($products as $product) {
	?>
	<tr>
		<td><?php echo $product['img']; ?></td>
		<td><?php echo $product['name']; ?></td>
		<td><?php echo $product['author']; ?></td>
		<td><?php echo $product['cateName']; ?></td>
		<td><?php echo $product['plsName']; ?></td>
		<td><?php echo $product['price']; ?></td>
		<td><?php echo $product['count']; ?></td>
		<td><a href="?p=editproduct&id=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="?p=deleteproduct&id=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-<?php echo $product['enable'] == 1 ? "remove" : "ok"; ?>"></span></a></td>
	</tr>
	<?php
		}
	?>
</table>