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