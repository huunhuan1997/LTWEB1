<?php 
        if(isset(($_SESSION["gioHang"])))
        {
            $gioHang = unserialize($_SESSION["gioHang"]);   
            $gioHang->deleteAll();
            $_SESSION["gioHang"] = serialize($gioHang);
            Provider::ChangeURL("index.php?a=6");
        }
?>