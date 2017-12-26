<?php
     class Provider
    {
        public static function execQuery($sql)
        {
            // Create connection
            $con = mysqli_connect("localhost", "root", "huunhuan", "bansach");

			mysqli_query($con,"set names 'utf8'");
			$result = mysqli_query($con,$sql);
            mysqli_close($con);
            return $result;
        }
        public static function ChangeURL($path)
        {
            echo '<script type = "text/javascript">';
            echo 'location = "'.$path.'";';
            echo '</script>';
        }
    }
?>