$("#card").on("submit", function(e) {
	e.preventDefault();
	$('#btnSubmit').text('❖ Vui Lòng Chờ ...');
    $('#btnSubmit').prop('disabled', true);
	$.ajax({
		url: "/handler/execute/card.php?action=card",
		type: "POST",
		data: $(this).serialize(),
		success: function(data) {
			var data = JSON.parse(data);
			$('#btnSubmit').prop('disabled', false);
			$('#btnSubmit').text('❖ Đổi Thẻ Ngay ');
            swal(data.title, data.message, data.type).then(function() {
                if (data.reload) {
                    window.location.reload();
                }
            });
		}
	});
});
$("#momo_auto").on("submit", function(e) {
	e.preventDefault();
	$.ajax({
		url: "handler/execute/card.php?action=momo",
		type: "POST",
		data: $(this).serialize(),
		success: function(data) {
			var data = JSON.parse(data);
            swal(data.title, data.message, data.type).then(function() {
                if (data.reload) {
                    window.location.reload();
                }
            });
		}
	});
});