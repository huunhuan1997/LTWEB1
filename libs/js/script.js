function KiemTraDangNhap() {
    var Us = document.getElementById("txtUsername");
    var Ps = document.getElementById("txtPassword");;
    if (Us.value.length == 0) {
        alert("Tên đăng nhậpkhông được để trống");
        Us.focus();
        return false;
    }
    if (Ps.value.length == 0) {
        alert("mật khẩu không được để trống");
        Ps.focus();
        return false;
    }
    return true;
}
function KiemTraCapNhat(SoLuongTon) {
    var SLNhap = document.getElementById("txtSoLuong").value;

    if (isNaN(SLNhap)) {
        alert("Vui lòng nhập số lượng chính xác");
        return false;
    }
    if (SLNhap > SoLuongTon) {
        alert("Sách này không đủ số lượng để đặt hàng");
        return false;
    }
    return true;
}

function KiemTraSoLuongSach(SoLuongTon)
 {
    var SoLuongNhap = document.getElementById("txtSoLuongNhap");
    if (SoLuongNhap.value == "" || isNaN(SoLuongNhap.value) || SoLuongNhap.value == 0)
        SoLuongNhap.value = 1
    if (SoLuongNhap.value > SoLuongTon) {
        alert("Sách này không đủ số lượng để đặt hàng");
        return false;
    }

    return true;

}