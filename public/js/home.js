jQuery(document).ready(function($) {
  $("#datepicker,.datepicker").datepicker({
    autoclose: true,
    todayHighlight: true
  });
  $(".hasDatepicker").datepicker({
    autoclose: true,
    todayHighlight: true
  });
   if($('.lazy').length > 0)

  $('.lazy').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    responsive: [
        {
            breakpoint:950,
            settings: {
               lazyLoad: 'ondemand',
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true
            }
        },
        {
            breakpoint:600,
            settings: {
               lazyLoad: 'ondemand',
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true
            }
        },
        {
            breakpoint: 400,
            settings: {
               lazyLoad: 'ondemand',
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true
            }
        }
    ]
  });
  $(".btn-today").click(function() {
    $(".hasDatepicker").datepicker('update', new Date());
  });
  $(".btn-tomorrow").click(function() {
    $("#departDate").datepicker('update', new Date(new Date().getTime() + 24 * 60 * 60 * 1000));

  });
  $("#mbtPrevDate").click(function() {
    $(".hasDatepicker").datepicker('update', new Date());
  });
  $("#mbtNextDate").click(function() {
    $("#departDate").datepicker('update', new Date(new Date().getTime() + 24 * 60 * 60 * 1000));

  });

  $(".show_hide").click(function() {
    $("#toggle_tst").toggle()

    return false;
  });
  $(".online-button").click(function() {
    $(this).parents('.searchResults').find('#choncho').toggle()

    return false;
  });
  $(".search-butt").click(function() {
    $("#hoang").toggle()

    return false;
  });
  $(".danhgia_link").click(function() {
    var id = $(this).data('tab');
    $("#"+id).toggle({
      duration: 10,

    });
    return false;

  });
  $('.bus-rating-tip').css('display','none');
  $(".comment-btn-popup").click(function() {

    $("#viet_dg").toggle({
      duration: 10,

    });
    return false;

  });
  $(".close-1").click(function() {

    $("#viet_dg").toggle({
      duration: 10,

    });


  });
  $(".lbgiamgia").click(function() {
    $(".hidd-1").toggle()

    return false;
  });
  if($('.rate_row').length > 0)
    $('.rate_row').starwarsjs();

  var availableTags = [

"An Giang", 
"Vũng Tàu",
"Bạc Liêu",
"Bắc Kạn",
"Bắc Giang",
"Bắc Ninh",
"Bến Tre",
"Bình Dương", 
"Bình Định",
"Bình Phước",
"Bình Thuận",
"Cà Mau",
"Cao Bằng" ,
"Cần Thơ",
"Đà Nẵng",
"Đắk Lắk",
"Đắk Nông",
"Điện Biên",
"Đồng Nai",
"Đồng Tháp",
"Gia Lai",
"Hà Giang",
"Hà Nam", 
"Hà Nội",
"Hà Tây",
"Hà Tĩnh",
"Hải Dương",
"Hải Phòng",
"Hòa Bình",
"Sài Gòn",
"Hậu Giang",
"Hưng Yên",
"Khánh Hòa",
"Kiên Giang",
"Kon Tum",
"Lai Châu",
"Lào Cai",
"Lạng Sơn",
"Lâm Đồng",
"Long An",
"Nam Định",
"Nghệ An",
"Ninh Bình",
"Ninh Thuận",
"Phú Thọ",
"Phú Yên",
"Quảng Bình",
"Quảng Nam",
"Quảng Ngãi",
"Quảng Ninh",
"Quảng Trị",
"Sóc Trăng",
"Sơn La",
"Tây Ninh",
"Thái Bình" ,
"Thái Nguyên" ,
"Thanh Hóa" ,
"Huế" ,
"Tiền Giang",
"Trà Vinh",
"Tuyên Quang",
"Vĩnh Long",
"Vĩnh Phúc",
"Yên Bái",
    /*tinh-tp*/

  ];
// /*console.log(request)*/
  /*$("#departPlace").autocomplete({
    source: function (request, response) {

        response($.grep(availableTags, function(value) {
          return value != $( "#destination" ).val();
        }))
      }
  });
  $("#destination").autocomplete({
   source: function (request, response) {
        response($.grep(availableTags, function(value) {
          return value != $( "#departPlace" ).val();
        }))
      }
  });*/
  // if($(".depart, .desti").lenght > 0)
    $(".depart, .desti").autocomplete({source: availableTags});
    //Tabcontent handle by hand
    $(".bus-hl-content .tab-contents").hide();
    $(".bus-hl-content .tab-contents:first").show();
    $(".bus-hl-content ul.nav-tabs li").click(function() {
        $(".bus-hl-content ul.nav-tabs li").removeClass("active");
        $(this).addClass("active");
        $(".bus-hl-content .tab-contents").hide();
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();
    });
    $('ul.nav-tabs').tab('show')
    var $carousel = $('.carousel').carousel();
    $('.carousel-control').click(function() {
      $(this).hasClass('left') ? $carousel.carousel('prev') : $carousel.carousel('next');
      return false;
    });
});


