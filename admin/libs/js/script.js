function LogOut() {
	$.ajax({
		url: "libs/handling/logout.php",
		success: function() {
			window.location.href = "/booksite/";
		}
	});
}

function OpenAdvSearch() {
	$("#advSearch").toggle('fast');
}

function OpenOrderDetail(orderid) {
	$("#orderdetail" + orderid).toggleClass("hidden");
}