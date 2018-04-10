jQuery(document).ready(function($) {
  $("#datepicker,.datepicker").datepicker({
    autoclose: true,
    todayHighlight: true
  });
  $(".hasDatepicker").datepicker({
    autoclose: true,
    todayHighlight: true
  });
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
    $("#choncho").toggle()

    return false;
  });
  $(".search-butt").click(function() {
    $("#hoang").toggle()

    return false;
  });
  $(".danhgia_link").click(function() {

    $("#danhgia").toggle({
      duration: 10,

    });
    return false;

  });
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
   $(' .rate_row ').starwarsjs();

  var availableTags = [

"An Giang ", "Bà Rịa-Vũng Tàu" ,
"Bạc Liêu" ,
"Bắc Kạn" ,
"Bắc Giang" ,
"Bắc Ninh" ,
"Bến Tre ",
"Bình Dương" , "Bình Định" ,
"Bình Phước" ,
"Bình Thuận" ,
"Cà Mau" ,
"Cao Bằng" ,
"Cần Thơ (TP)" ,
"Đà Nẵng (TP)" ,
"Đắk Lắk ",
"Đắk Nông" ,
"Điện Biên" ,
"Đồng Nai" ,
"Đồng Tháp ",
"Gia Lai" ," Hà Giang" , "Hà Nam" , "Hà Nội" ,
"Hà Tây" ,
"Hà Tĩnh",
"Hải Dương" ,
"Hải Phòng (TP)" ,
"Hòa Bình" ,
"Hồ Chí Minh (TP)" ,
"Hậu Giang" ,
"Hưng Yên" ,
"Khánh Hòa ",
"Kiên Giang ",
"Kon Tum ",
"Lai Châu" ,
"Lào Cai",
"Lạng Sơn" ,
"Lâm Đồng" ,
"Long An" ,
"Nam Định ",
"Nghệ An" ,
"Ninh Bình",
"Ninh Thuận" ,
"Phú Thọ ",
"Phú Yên" ,
"Quảng Bình" ,
"Quảng Nam ",
"Quảng Ngãi" ,
"Quảng Ninh ",
"Quảng Trị" ,
"Sóc Trăng" ,
"Sơn La" ,
"Tây Ninh",
"Thái Bình" ,
"Thái Nguyên" ,
"Thanh Hóa" ,
"Thừa Thiên - Huế" ,
"Tiền Giang",
"Trà Vinh" ,
"Tuyên Quang" ,
"Vĩnh Long" ,
"Vĩnh Phúc" ,
"Yên Bái" ,
    /*tinh-tp*/
    "Hải Hậu - Nam Định",
    "Nam Trực - Nam Định",
    "Xuân Trường - Nam Định",
    "Kim Sơn - Ninh Bình",
    "Mai Châu - Hòa Bình"

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
  $(".depart").autocomplete({
   source: function (request, response) {
        response($.grep(availableTags, function(value) {
          return value != $( ".desti" ).val();
        }))
      }
  });
  $(".desti").autocomplete({
   source: function (request, response) {
        response($.grep(availableTags, function(value) {
          return value != $( ".depart" ).val();
        }))
      }
  });
});


