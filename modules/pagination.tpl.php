<?php
	$pageURL = $pageURL = http_build_query(array_merge($_GET, array("page" => "1")));
?>

<div class="w100p clearfix">
	<ul class="pagination pull-right">

<?php
	$totalPages = ceil($total / $countPerPage);

	$range = 2;

	$startPaginationNumb = $currentPage - $range;
	$endPaginationNumb = $currentPage + $range + 1;

	if ($currentPage > 1 && $currentPage > $range + 1) {
?>
		<li><a href="<?php echo "?" . $pageURL; ?>">Trang đầu tiên</a></li>

<?php
}
	for ($i=$startPaginationNumb; $i < $endPaginationNumb ; $i++) { 
		
		if ($i > 0 && $i <= $totalPages) {

			if ($i == $currentPage) {
?>
				<li class="active"><a href=""><?php echo $currentPage; ?></a></li>
<?php
			} else {
				$pageURL = http_build_query(array_merge($_GET, array("page" => "$i")));
?>
				<li><a href="<?php echo "?" . $pageURL; ?>"><?php echo $i; ?></a></li>
<?php
			}
		}
	}

	if ($currentPage < $totalPages && $currentPage < $totalPages - $range) {
		$pageURL = http_build_query(array_merge($_GET, array("page" => "$totalPages")));
?>
	<li><a href="<?php echo "?" . $pageURL; ?>">Trang cuối cùng</a></li>
<?php
	}
?>
	</ul>
</div>