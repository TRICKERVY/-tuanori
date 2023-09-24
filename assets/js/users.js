

$("#flogin").on("submit", function(e) {
	e.preventDefault();
	$.ajax({
		url: "handler/execute/users.php?action=login",
		type: "POST",
		data: $(this).serialize(),
		success: function(data) {
			var data = JSON.parse(data);
            swal(data.title, data.message, data.type).then(function() {
                if (data.reload) {
                    window.location.href = "/";
                }
            });
		}
	});
});

$("#fregister").on("submit", function(e) {
	e.preventDefault();
	$.ajax({
		url: "handler/execute/users.php?action=register",
		type: "POST",
		data: $(this).serialize(),
		success: function(data) {
			var data = JSON.parse(data);
            swal(data.title, data.message, data.type).then(function() {
                if (data.reload) {
                    window.location.href = "/";
                }
            });
		}
	});
});

$("#changepass").on("submit", function(e) {
	e.preventDefault();
	$.ajax({
		url: "handler/execute/users.php?action=changepass",
		type: "POST",
		data: $("#changepass").serialize(),
		success: function(data) {
			var data = JSON.parse(data);
            // Sau khi đã lấy dữ liệu từ phần php xử lý, hiển thị ra màn hình
            swal(data.title, data.message, data.type).then(function() {
                // Nếu đăng nhập thành công, reload lại trang để chuyển người dùng về trang chủ
                if (data.reload) {
                    window.location.reload();
                }
            });
		}
	});
});
