<div class="panel panel-default" id="cateMdl">
	<div class="panel-heading">CÁC THỂ LOẠI</div>
	<ul class="list-group">
	<?php
		$query = "SELECT id, name FROM category where enable = 1 ORDER BY id ASC";
		$categories = Database::executeQuery($query);
		foreach ($categories as $cate) {
	?>
		<li><a class="list-group-item" href="?p=products&cate=<?php echo $cate["id"]; ?>"><?php echo $cate["name"]; ?></a></li>
	<?php
		}
	?>
	</ul>
</div>