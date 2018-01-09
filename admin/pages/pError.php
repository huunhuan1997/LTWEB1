<h1>
    <?php
        changeTitle("Lỗi");
        $id = 1;
        if(isset($_GET['id']))
            $id = $_GET['id'];
        switch ($id)
        {
            case 1:
                echo "Chức năng không hỗ trợ";
                break;
            case 2:
                echo "Bạn không có quyền truy cập chức năng này";
                break;
            case 3:
                echo "Thiếu thông tin để thực hiện chức năng này";
                break;
            case 4:
                echo "Tên đăng nhập hoặc mật khẩu bị sai";
                break;
            case 5:
                echo"không có sách nào !!!";
                break;
            case 6:
                echo "Nhập thông tin cho chính xác bạn nhé !!!";
                break;
            case 7:
                echo "vui lòng đăng nhập trước khi vào khu vực cấm trẻ em nhé !!!";
                break;
            case 8:
                echo "Vui lòng chọn sản phẩm rồi mới đặt hàng bạn nhé!!!";
                break;
            default:
                echo "Không có trang này đâu nhé ahihih !!!";
        }
    ?>
</h1>
<img src='images/error/error.jpg' width="98%" />