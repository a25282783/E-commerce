$(function(){
	$('.indexBn-slick').slick({
		dots: true,
		speed: 1200,
		autoplay: false,
		autoplaySpeed: 5000,
		cssEase: 'linear',
		arrows: true,
		prevArrow: $('.arrow-control .left'),
		nextArrow: $('.arrow-control .right'),
	});

	$('.index-p1-out .index-p1').slick({
		swipeToSlide:true,
		dots: false,
		autoplay: false,
		infinite: true,
		// autoplaySpeed: 2000,
		speed: 500,
		cssEase: 'ease',
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.ic1').find('.left'),
		nextArrow: $('.ic1').find('.right'),
		responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    },
		    {
		      breakpoint: 769,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    }
		    ,{
		      breakpoint: 540,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    },
		]
	});

	$('.index-p2-out .index-p1').slick({
		swipeToSlide:true,
		dots: false,
		autoplay: false,
		infinite: true,
		speed: 500,
		cssEase: 'ease',
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.ic2').find('.left'),
		nextArrow: $('.ic2').find('.right'),
		responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    },
		    {
		      breakpoint: 769,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    }
		    ,{
		      breakpoint: 540,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        dots:true,
		      }
		    },

		],
	});

	// $('.index-p3-out').slick({
	// 	swipeToSlide:true,
	// 	dots: true,
	// 	autoplay: false,
	// 	infinite: true,
	// 	speed: 500,
	// 	cssEase: 'ease',
	// 	slidesToShow: 1,
	// 	slidesToScroll: 1,
	// 	responsive: [
	//         {
	//             breakpoint: 9999,
	//             settings: "unslick"
	//         },
	//         {
	//             breakpoint: 768,
	//              settings: {
	//                     slidesToShow: 1,
	//                     slidesToScroll: 1,
	//                     infinite: true,
	//                     dots: true
	//                 }
	//         }
	//     ]
	// });


	$('.index-adslide-ul').slick({
		swipeToSlide:true,
		dots: false,
		autoplay: false,
		infinite: true,
		speed: 500,
		cssEase: 'ease',
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		prevArrow: $('.index-adslide').find('.left'),
		nextArrow: $('.index-adslide').find('.right'),
		responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    },
		],
	});


	//


	// if ($(document).width() > 991) {
	//    $('.dropdown-menu', this).css('margin-top', 0);
	//    $('.dropdown').hover(function () {
	//        // $('.dropdown-toggle', this).trigger('click').toggleClass("disabled");
	//        $('.dropdown-menu').toggleClass("show");
	//    });



	// }


})





$("body").css("margin-top", $(".header-input").outerHeight()+20+$("header").outerHeight()+"px");

$(window).resize(function(){
	$("body").css("margin-top", $(".header-input").outerHeight()+20+$("header").outerHeight()+"px");

});


function limit_text(text_obj, limit_num){
	$(text_obj).each(function(){
	//alert();
	//console.log($(this).text().length);
        var x = $(this).html().replace(/ /g,"");
        var y = x.replace(/\n/g,"");
		//var h3_number = $(this).html().length;
        var h3_number = y.length;
		if(h3_number > limit_num){
			//var text_board_right_limit_h3 = $(this).html().substring(0, limit_num);
            var text_board_right_limit_h3 = y.substring(0, limit_num);
			//console.log(text_board_right_limit_h3)
            if(text_board_right_limit_h3.slice(-1)=="<"){
                text_board_right_limit_h3 = text_board_right_limit_h3.slice(0, -1)
            }
			$(this).html(text_board_right_limit_h3 + '...');
		}
        //console.log(y)
	});
}



//$(".bn3-box h2")

// limit_text(".bn3-box h2", 8);
// limit_text(".bn3-box p", 50);





$(".slider.img-slider").slick({
	dots: false,
	responsive: [{
        breakpoint: 5000,
        settings: {
            slidesToShow: 4
        }
    }, {
        breakpoint: 1200,
        settings: {
            slidesToShow: 4
        }
    }, {
        breakpoint: 992,
        settings: {
            slidesToShow: 4
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 4
        }
    }, {
        breakpoint: 577,
        settings: {
            slidesToShow: 1
        }
    }]
});

//==============shop-cart==============
$(".shipping-radio-area .radio-wrap").on('click', function(){
	$(".shipping-radio-area .radio-wrap").removeClass("active");
	$(this).addClass("active");

	let cur_index = $(this).index();

	$(".shipping-radio-area .radio-text-wrap").css("display", "none");
	$(`.shipping-radio-area .radio-text-wrap:nth-child(${cur_index+1})`).css("display", "block");
	//alert($(this).index())
});


$(".payment-radio-area .radio-wrap").on('click', function(){
	$(".payment-radio-area .radio-wrap").removeClass("active");
	$(this).addClass("active");

	let cur_index = $(this).index();

	$(".payment-radio-area .radio-text-wrap").css("display", "none");
	$(`.payment-radio-area .radio-text-wrap:nth-child(${cur_index+1})`).css("display", "block");
	//alert($(this).index())
});
$(".radio-text-wrap").css("display", "none");
$(".radio-text-wrap:nth-child(1)").css("display", "block");


//===============person-login-register==================
$(".forget-pswd-page.forget, .mask").css("display", "none");
$(".forget-pswd-link").on('click', function(e){
    e.preventDefault();
    $("#forget-pswd-send").hide();
	$("#forget-pswd-input").show();
	$("#forgot_password_email").val("");

	$(".forget-pswd-page.forget, .mask").css("opacity", "1");
	$(".forget-pswd-page.forget, .mask").fadeIn();
	$("header, .header-input, section, footer").addClass("blur-class");
})

$(".forget-pswd-page .close-btn").on('click', function(){
	$(".forget-pswd-page, .mask").fadeOut();
	$("header, .header-input, section, footer").removeClass("blur-class");
});


//============img-slider-wrap============
let x = $(".img-slider li.slick-current img").attr("src");
$(".product-img .img-wrap img").attr("src", x);

$(".img-slider-wrap img").on('click', function(){
	//alert($(this).attr("src"))
	$(".product-img .img-wrap img").attr("src", $(this).attr("src"));
});



//====================
function limit_text(text_obj, limit_num){
	$(text_obj).each(function(){
	//alert();
	//console.log($(this).text().length);
        var x = $(this).html().replace(/ /g,"");
        var y = x.replace(/\n/g,"");
		//var h3_number = $(this).html().length;
        var h3_number = y.length;
		if(h3_number > limit_num){
			//var text_board_right_limit_h3 = $(this).html().substring(0, limit_num);
            var text_board_right_limit_h3 = y.substring(0, limit_num);
			//console.log(text_board_right_limit_h3)
            if(text_board_right_limit_h3.slice(-1)=="<"){
                text_board_right_limit_h3 = text_board_right_limit_h3.slice(0, -1)
            }
			$(this).html(text_board_right_limit_h3 + '...');
		}
        //console.log(y)
	});
}
limit_text(".ip-box .ip-name", 40)



$('button.navbar-toggler').click(function(){
    //if($(".navbar-collapse").hasClass("show") == true)console.log(1)
    $("header ~ *").on('click', function(e){
		if($(".navbar-collapse").hasClass("show") === true){
			e.preventDefault();
            $(".navbar-collapse").removeClass("show")
        }else{
            return true
        }

    });

});


//============================shop-cart=======================
$(".for-three-invoice").css("display", "none");
$(".don-text").css("display", "none");
$('input[type=radio][name=invoice]').change(function() {
    $(".for-two-invoice").fadeIn();
    $(".don-text").fadeOut();
    $(".for-three-invoice").css("display", "none");
    if (this.value == 'three') {
        $(".for-three-invoice").fadeIn();
    }
    if (this.value == 'don') {
        $(".for-two-invoice").css("display", "none");
        $(".don-text").fadeIn();
    }
});




$(".chose-store-btn").css("display", "none");
$('input[type=radio][name=shipping-methods]').change(function() {
    $(".chose-store-btn").css("display", "none");
    if (this.value == 'store') {
        $(".chose-store-btn").fadeIn();
    }
});


//same address
$(".same-address").change(function() {
    if(this.checked) {
        $(".invoice-city").val($(".receiver-city").val());
        $(".invoice-county").val($(".receiver-county").val());
        $(".invoice-zip").val($(".receiver-zip").val());
        $(".invoice-address").val($(".receiver-address").val());
    }else{
        $(".invoice-city").val("");
        $(".invoice-county").val("");
        $(".invoice-zip").val("");
        $(".invoice-address").val("");
    }
});


var ranges = [
	'\ud83c[\udf00-\udfff]', // U+1F300 to U+1F3FF
	'\ud83d[\udc00-\ude4f]', // U+1F400 to U+1F64F
	'\ud83d[\ude80-\udeff]'  // U+1F680 to U+1F6FF
];


function removeInvalidChars($el) {
	var str = $($el).val();

	str = str.replace(new RegExp(ranges.join('|'), 'g'), '');
	$($el).val(str);
}

$.validator.addMethod("letters", function(value, element) {
	return this.optional(element) || value == value.match(/^([^~`!@#$%^&*()_+={}"'\[\]\{\}?\/<>,:;\-])*$/gm);
});


//=================================



$(".dropdown-submenu ul").each(function(){
    if($(this).children().length > 5){
        var x = this;
        if($(window).width()<=1199){
            $(x).css("column-count", "1");
        }else{
            $(x).css("column-count", "2");
        }
        $(window).resize(function(){

            if($(window).width()<=1199){
                $(x).css("column-count", "1");
            }else{
                $(x).css("column-count", "2");
            }
        })

    }

});



// $(".input-wrap.count .add").click(function(){
//     var x = parseInt($(this).siblings(".spinner").val());
//     $(this).siblings(".spinner").val(x+1);
// });

// $(".input-wrap.count .sub").click(function(){
//     var x = parseInt($(this).siblings(".spinner").val());
//     if(x==0){
//         return
//     }
//     $(this).siblings(".spinner").val(x-1);
// });

$(document).ready(function(){
	if($(window).width()<1199){
	  $('.dropdown-menu h3.dropdown-item').on('click', function (e) {
	      e.stopPropagation();
	      var $el = $(this);
	      var $parent = $(this).offsetParent(".dropdown-menu");
	      if (!$(this).next().hasClass('show')) {
	        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	      }
	      var $subMenu = $(this).next(".dropdown-menu");
	      $subMenu.toggleClass('show');

	      $(this).parent("li").toggleClass('show');

	      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
	        $('.dropdown-menu .show').removeClass("show");
	      });
	    });
	}
})




