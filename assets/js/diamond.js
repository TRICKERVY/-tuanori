$("#diamond").on("submit", function(e) {
	e.preventDefault();
	$.ajax({
		url: "/handler/execute/diamond.php?action=kimcuong",
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