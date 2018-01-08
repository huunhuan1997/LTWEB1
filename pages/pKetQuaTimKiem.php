<?php changeTitle('kết Quả Tìm Kiếm'); ?>
<?php 
    $TenTach = $_GET['TenSach'];
    $GiaTu = $_GET['GiaTu'];
    $GiaDen = $_GET['GiaDen'];
    $TheLoai = $_GET['TheLoai'];
    $NXB = $_GET['NXB'];
    $TACGIA = $_GET['TacGia'];

    $query = "SELECT sp.MaSanPham,sp.TenSanPham,sp.GiaSanPham,sp.TenTacGia,sp.HinhURL
                from sanpham sp,hangsanxuat hsx,loaisanpham LSP
                where  sp.BiXoa = FALSE 
                       and sp.MaLoaiSanPham = LSP.MaLoaiSanPham 
                       and hsx.MaHangSanXuat = sp.MaHangSanXuat
                       and sp.GiaSanPham BETWEEN $GiaTu and $GiaDen";
    if(!empty($TenTach))
    {
        $query = $query." and sp.TenSanPham like '%$TenTach%'";
    }
    if(!empty($TheLoai))
    {
        $query = $query." and LSP.MaLoaiSanPham = $TheLoai";
    }
    if(!empty($NXB))
    {
        $query = $query." and hsx.MaHangSanXuat = $NXB";
    }
    if(!empty($TACGIA))
    {
        $query = $query." and sp.TenTacGia = '$TACGIA'";
    }
    $result = Provider::execQuery($query);
    $row = mysqli_fetch_array($result);
    if(count($row) > 0)
    {
        $TenSanPham = $row["TenSanPham"];
        $HinhURL = $row["HinhURL"];
        $MaSanPham = $row["MaSanPham"];
        $GiaSanPham = $row["GiaSanPham"];
        $TenTacGia = $row["TenTacGia"];

        include("templates/HienThiDSSach.php");
        while($row = mysqli_fetch_array($result))
        {
            $TenSanPham = $row["TenSanPham"];
            $HinhURL = $row["HinhURL"];
            $MaSanPham = $row["MaSanPham"];
            $GiaSanPham = $row["GiaSanPham"];
            $TenTacGia = $row["TenTacGia"];

            include("templates/HienThiDSSach.php");
        }
    }
    else
    {
         echo "<div class='alert alert-danger'>Không có sách nào.</div>";
    }
?>