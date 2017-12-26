<div class="container" id="navigation">
	<div class="navbar navbar-inverse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">TRANG CHỦ</a></li>
			<?php 
			if(isset($_SESSION["MaTaiKhoan"]))
			{
				?>
						<li><a href="index.php?a=6">Giỏ hàng</a></li>
				<?php
			}
			?>
		
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