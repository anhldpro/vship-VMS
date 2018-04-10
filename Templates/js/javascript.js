jQuery( document ).ready(function($) {
  $("#departDate, .datetimepicker4").datetimepicker();
 $('.readmore').curtail({
            limit: 230,
            ellipsis: '...',
            toggle: true
        });
 $( function() {
    var availableTags = [
      "Hà Nội",
      "Hải Phòng",
      "Hà Nam",
      "Thái Bình",
     "Vĩnh Phúc",
      "Nghệ An",
      "Thanh Hóa",
      "Lào Cai",
      "Hải Dương",
      "Cẩm Phà",
      "Hạ Long",
      "Lê Chân",
      "Cát Bà",
      "Yên Bái",
      "Sài Gòn",
      "Vũng Tàu",
      "Quảng Bình",
      "Cà Mau",
      "Bình Dương",
      "Thái Nguyên",
      "Móng Cái",
      "Hưng Yên"
    ];
    
    $( "#departPlace" ).autocomplete({
      source: function (request, response) {
        response($.grep(availableTags, function(value) {
          return value != $( "#destination" ).val();
        }))
      }
    });
     $( "#destination" ).autocomplete({
      source: function (request, response) {
        response($.grep(availableTags, function(value) {
          return value != $( "#departPlace" ).val();
        }))
      }
    });
  } );
  $(".tab-content").hide();
    $(".tab-content:first").show();
 
    $("ul.nav-tabs li").click(function() {
        $("ul.nav-tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab-content").hide();
        var activeTab = $(this).attr("rel");
        $("#"+activeTab).fadeIn();
    });
    $('.example').barrating({
        theme: 'fontawesome-stars'
      });
   
});
