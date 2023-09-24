var page = 1;
var  type_acc = sv = hanhtinh = type = rank = frame = price = order = champ_str = skin_str = ma = count_champ = count_skin = count_champ = order = bacngoc = '';
type = $('input[name="type"]')['val']();

$(document)['ready'](function () {


    $('.sl-sebox')['click'](function () {
        type = $(this)['attr']('data-type');
        if (type == 'lien-quan') {
            frame = '';
            $('input.property-filter')['hide']();
            $('select[data-filter="tim-theo-khung"]')['closest']('li')['hide']();
            $('.swiper-slide[data-type=""]')['removeClass']('active');
            $(this)['addClass']('active')
        } else {
            $('input.property-filter')['show']();
            $('select[data-filter="tim-theo-khung"]')['closest']('li')['show']();
            $('.swiper-slide[data-type="lien-quan"]')['removeClass']('active');
            $(this)['addClass']('active')
        };
        page = 1;
        load_account_list();
        return !1
    });
    $('.huy')['click'](function () {//huy bo
        type_acc = sv = hanhtinh = type = rank = frame = price = order = champ_str = skin_str = ma = count_champ = count_skin = count_champ = order = bacngoc = '';
        page = 1;
        $('.form_search_cate')[0].reset();


        load_account_list()
    });
    $('.botton_search_cate')['click'](function (event) {
        
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $(".sc_prod_cate").offset().top
        }, 500);
        type = $('input[name="type"]').val();
        page = 1;
        sv = $('select[name="server"]')['val']();
        hanhtinh = $('select[name="hanhtinh"]')['val']();
        type_acc = $('input[name="type_acc"]')['val']();
        ma = $('input[name="code"]')['val']();
        champ_str = $('input[name="champ_name"]')['val']();
        skin_str = $('input[name="skin_name"]')['val']();
        price = $('select[name="money"]')['val']();
        count_champ = $('input[name="champ"]')['val']();
        count_skin = $('input[name="skin"]')['val']();
        bacngoc = $('input[name="gem"]')['val']();
        rank = $('select[name="rank"]')['val']();
        frame = $('select[name="khung"]')['val']();
        order = $('select[name=group]')['val']();
        load_account_list()
        $(".huy").show();
        
    });
    $('.sc_prod_cate')['on']('click', '.pagination li.item a[href]', function (e) {
        e.preventDefault();
        page = $(this)['attr']('data-ci-pagination-page');
        type = $('input[name="type"]').val();
        type_acc = $('input[name="type_acc"]')['val']();

        $('html, body').animate({
            scrollTop: $(".sc_prod_cate").offset().top
        }, 500);
        load_account_list();
        return !1
    })

    var total = Math.ceil($("input[name=total]").val() / 20);
    $('.demo3').bootpag({
      total: total,
      maxVisible: 5,
      leaps: true,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'

    }).on('page', function(event, num){
        $('html, body').animate({
            scrollTop: $(".sc_prod_cate").offset().top
        }, 500);
            page = num;
            type = $('input[name="type"]').val();
            type_acc = $('input[name="type_acc"]')['val']();

            $(".list_prod_cate > .row").empty();
            $("#loading").show();
            load_account_list();

      });



});

function load_account_list() {
    var _0x6473x4 = {
        page: page
        , rank: rank
        , khung: frame
        , gia: price
        , sapxep: order
        , tuong: champ_str
        , trangphuc: skin_str
        , bacngoc : bacngoc
        , sapxep : order
        , count_champ : count_champ
        , count_skin: count_skin
        , ma : ma
        , loai: type
        , sv : sv
        , hanhtinh : hanhtinh
        , type_acc: type_acc
    };
    $(".list_prod_cate > .row")['empty']();
    $('#loading')['show']();
    $['post']('/view/custom', _0x6473x4, function (_0x6473x5) {
            if (_0x6473x5['url']) {
                history['pushState']({}
                    , null, _0x6473x5['url'])
            } else {
                history['pushState']({}
                    , null, location['pathname'])
            };
            $(".list_prod_cate > .row")['html'](_0x6473x5['html']);
            $('#loading')['hide']()
            $('#phantrang')['html'](_0x6473x5['page']);
        }
        , 'json')
}
