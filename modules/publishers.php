<div class="panel panel-default" id="plsMdl">
	<div class="panel-heading">NHÀ XUẤT BẢN</div>
	<ul class="list-group">
	<?php
		$query = "SELECT id, name FROM publisher where enable = 1 ORDER BY id ASC";
		$publishers = Database::executeQuery($query);
		foreach ($publishers as $pls) {
	?>
		<li><a class="list-group-item" href="?p=products&pls=<?php echo $pls["id"]; ?>"><?php echo $pls["name"]; ?></a></li>
	<?php
		}
	?>
	</ul>
</div>