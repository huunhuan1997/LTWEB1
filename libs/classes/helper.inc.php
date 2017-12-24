<?php
	function back() {
?>
<script type="text/javascript">
	window.history.back();
</script>
<?php
	}

	function f5() {
?>
<script type="text/javascript">
		window.location.reload(true);
</script>
<?php
 	}

 	function redirect($url) {
?>
<script type="text/javascript">
	window.location.replace("<?php echo $url; ?>");
</script>
<?php
	}

	function changeTitle($title) {
?>
<script type="text/javascript">
		var title = "<?php echo $title; ?>";
		if (document.title != title) {
			document.title = title;
		}
</script>
<?php
	}
?>
