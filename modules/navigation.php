<div class="container" id="navigation">
	<div class="navbar navbar-inverse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">TRANG CHỦ</a></li>
			<li><a href="index.php?p=products&cate=hot">Sách HOT</a></li>
			<li><a href="index.php?p=products&cate=moi">Sách mới</a></li>
			<li><a href="index.php?p=products&cate=tatca">Mọi thể loại</a></li>		
			<li><a href="index.php?p=cart">Giỏ hàng</a></li>
		</ul>
		<form action="index.php" method="get" class="navbar-form navbar-right" id="searchBox">
			<input type="hidden" name="p" value="products">
			<div class="input-group">
				<input type="search" name="name" id="keyword" placeholder="Tên sách" class="form-control">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default" onclick="OpenAdvSearch();">Tuỳ chọn</button>
      			</span>
			</div>
			<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
			<div id="advSearch">
				<?php include_once("modules/advsearch.php"); ?>
			</div>
		</form>
	</div>
</div>