$(document).ready(function() {
	$(".thumbnail img").height(function() {
		return ($(this).width()*1.3);
	});

	$(".productThumb").height(function() {
		return $(".productThumb img").height() + 120;
	});
});

function CheckLogin() {
	var username = $("#txtUsername");
	var pass = $("#txtPassword");

	username.css("border", "initial");
	pass.css("border", "initial");

	if (username.val().length == 0) {
		username.css("border", "1px solid #a94442");
		username.focus();
		return false;
	}

	if (pass.val().length == 0) {
		pass.css("border", "1px solid #a94442");
		pass.focus();
		return false;
	}

	$.ajax({
		url: "libs/handling/login.php",
		type: "post",
		dataType: "text",
		data: {
			username: username.val(),
			password: pass.val()
		},
		success: function(result) {
			window.location.reload(true);
		}
	});
	return false;
}

function LogOut() {
	$.ajax({
		url: "libs/handling/logout.php",
		success: function() {
			window.location.reload(true);
		}
	});
}

function AddToCart(productid, count) {
	var quantity = $("#txtQuantity").val();
	if (quantity == "" || isNaN(quantity))
		quantity = 1;

	if (quantity > count) {
		alert("Sách này không đủ số lượng để đặt hàng");
		return;
	}

	$.ajax({
		url: "libs/handling/addtocart.php",
		type: "get",
		dataType: "text",
		data: {
			productid: productid,
			quantity: quantity
		},
		success: function(message) {
			alert(message);
		}
	});
}

function OpenAdvSearch() {
	$("#advSearch").toggle('fast');
}

function OpenOrderDetail(orderid) {
	$("#orderdetail" + orderid).toggleClass("hidden");
}

function CheckRegister() {

	var username = $("#regUsername");
	var pass = $("#regPassword");
	var repass= $("#regRePassword");
	var name = $("#regHoTen");
	var addr = $("#regDiaChi");
	var email = $("#regEmail");
	var birthday = $("#dtNgaySinh");

	username.css("border-color", "#bbb");
	pass.css("border-color", "#bbb");
	repass.css("border-color", "#bbb");
	name.css("border-color", "#bbb");
	addr.css("border-color", "#bbb");
	email.css("border-color", "#bbb");
	birthday.css("border-color", "#bbb");

	if (username.val().length < 8) {
		username.css("border-color", "#a94442");
		alert("Tên đăng nhập phải trên 8 kí tự");
		return false;
	}

	var hasUpper = /[A-Z]/.test(pass.val());
	var hasLower = /[a-z]/.test(pass.val());
	var hasNumb = /\d/.test(pass.val());
	var hasSpecial = /\W/.test(pass.val());
	var passStrength = hasUpper + hasLower + hasNumb + hasSpecial;

	if (pass.val().length < 8 || passStrength < 4) {
		pass.css("border-color", "#a94442");
		alert("Mẩu khẩu có độ dài trên 8 kí tự, bao gồm chữ thường, chữ hoa, số và kí tự đặc biệt");
		return false;
	}

	if (pass.val() != repass.val()) {
		repass.css("border-color", "#a94442");
		alert("Mật khẩu không khớp");
		return false;
	}

	if (name.val().length == 0 || !/([a-zA-Z]+\s*)+/.test(name.val())) {
		name.css("border-color", "#a94442");
		alert("Tên không hợp lệ");
		return false;
	}

	if (addr.val().length == 0) {
		addr.css("border-color", "#a94442");
		alert("Địa chỉ không hợp lệ");
		return false;
	}

	if (birthday.val() == "" || !/\d+.\d+.\d+/.test(birthday.val())) {
		birthday.css("border-color", "#a94442");
		alert("Ngày sinh không hợp lệ");
		return false;
	}

	var emailPattern = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
	if (email.val().length == 0 || !emailPattern.test(email.val())) {
		email.css("border-color", "#a94442");
		alert("Email không hợp lệ");
		return false;
	}
	
	return true;
}