var BaseCompAccount = function() {
    var n = function() {
        jQuery(document).on("click", ".js-account-buy", function() {
            var n = jQuery(this);
            swal({
                title: "Xác nhận mua tài khoản #" + n.data("id"),
                text: 'Sau khi mua xong có thể xem thông tin đăng nhập tại mục "Tài khoản đã mua", chắc chắn mua chứ?',
                icon: "warning",
                dangerMode: !0,
                closeOnCancel: true,

                buttons: {
                    cancel: "Hủy",
                    confirm: {
                        text: "Có, tôi muốn mua",
                        closeModal: !1
                    }
                }
            }).then(function(t) {
                if (t) {

                jQuery.ajax({
                    method: "POST",
                    url: n.data("action"),
					data: { id: n.data("id")},
                    dataType: "json"
                }).done(function(n) {

                    if(n.err == 0){
                        swal({
                            title: "Thành công",
                            text: n.msg,
                            icon: "success",
                            closeOnClickOutside: !1
                        }).then(function() {
                           location.replace("/lich-su-mua.html")
                        })
                    } else {
                        swal({
                            title: "Lỗi",
                            text: n.msg,
                            icon: "error",
                            closeOnClickOutside: !1
                        });

                    }

                }).fail(function(n, t, e) {
                    swal("Oops!", n.msg,"error")
                })
                }
            })
        })
    };
    return {
        init: function() {
            n()
        }
    }
}();
jQuery(function() {
    BaseCompAccount.init()
});