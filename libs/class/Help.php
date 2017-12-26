<?php 
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