<?php 
    if (isset($_POST['username']) && isset($_POST['password'])) 
    {
        $Username =$_POST['username'];
        $Password = md5($_POST['password']);
        $query = "SELECT MaTaiKhoan, TenHienThi, MaLoaiTaiKhoan
                    FROM taikhoan
                    WHERE BiXoa = 0 AND TenDangNhap = '$Username'
                                    AND MatKhau = '$Password'";
         $list = Provider::execQuery($query);                                                                                                                   
         $row = mysqli_fetch_array($list);
         if($row!= null)
         {
             $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
             $_SESSION["TenHienThi"] = $row["TenHienThi"];
             $_SESSION["MaLoaiTaiKhoan"] = $row["MaLoaiTaiKhoan"];
             $_SESSION['loginTime'] = time();
             $_SESSION['loggedIn'] = 1;
            provider::ChangeURL($_SESSION["curURL"]);
         }
         else
         {
            provider::ChangeURL("index.php?a=0&id=4");
         }
        }
?>
