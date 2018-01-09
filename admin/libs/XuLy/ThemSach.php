<?php 

    if(!empty($_POST['TenSanPham']) &&
        !empty($_POST['TenTacGia']) &&
        !empty($_POST['LoaiSanPham']) &&
        !empty($_POST['NXB']) &&
        !empty($_POST['GiaSanPham']) &&
        !empty($_POST['SoLuongTon'])
    )
    {
        $TenSanPham = $_POST['TenSanPham'];
        $TenTacGia = $_POST['TenTacGia'];
        $MaLoaiSanPham = $_POST['LoaiSanPham'];
        $MaHangSanXuat = $_POST['NXB'];
        $GiaSanPham = $_POST['GiaSanPham'];
        $MoTa = $_POST['MoTa'];
        $SoLuongTon = $_POST['SoLuongTon'];
        if(!empty($_FILES['HinhURL']['name']))
        {
            $NameFile = $_FILES['HinhURL']['name'];
            move_uploaded_file($_FILES['HinhURL']['tmp_name'], "../images/Product/" . $NameFile);

            $query ="insert into sanpham(TenSanPham,TenTacGia,MaLoaiSanPham,MaHangSanXuat,GiaSanPham,MoTa,SoLuongTon,HinhURL) 
            values('$TenSanPham','$TenTacGia',$MaLoaiSanPham,$MaHangSanXuat,$GiaSanPham,'$MoTa',$SoLuongTon,'$NameFile')";
        }
        else
        {
            $query ="insert into sanpham(TenSanPham,TenTacGia,MaLoaiSanPham,MaHangSanXuat,GiaSanPham,MoTa,SoLuongTon) 
            values('$TenSanPham','$TenTacGia',$MaLoaiSanPham,$MaHangSanXuat,$GiaSanPham,'$MoTa',$SoLuongTon)";
        }
        $result = Provider::execQuery($query);
        if($result)
        {
            Provider::changeURL('index.php?a=3');
        }
    }
    else
    {
        ?>
        <div class='alert alert-danger'><?php echo "Vui lòng điền đầy đủ thông tin"; ?></div>
        <?php
    }
?>