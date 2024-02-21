// mobile menu  --------------------
 
    
$(document).ready(function() { 
  $(".mobile-menu .tab-head .left button").click(function(){
      $(this).parents('.tab-pane').removeClass('active show');
      $('.menu-section .rightbar .rightbar-content .center .content .mobile-menu .top-menu .nav-link').removeClass('active');

    }); 
  });
     
// mobile menu  --------------------

// <!-- header/// -->
$(window).scroll(function() {
  if ($(this).scrollTop() > 1) {
      $('.header').addClass("sticky").fadeIn(1000); 
  } else {
      $('.header').removeClass("sticky"); 

  }
}); 
// <!-- header/// -->



// toggle menu -------------------
$(".menu-icon-trigger").click(function(){
  $(".header-section .links").toggleClass('is-active');  
});
$(".close_btn").click(function(){
  $(".header-section .links").toggleClass('is-active');  
});
$(".header-section .overlay").click(function () {
  $(".header-section .links").toggleClass('is-active');
  $(".header-section .overlay").toggleClass('ac');
  $(".hamburger").toggleClass('is-active');
});


var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
          $(".header-section .links").toggleClass('is-active'); 
          $(".header-section .overlay").toggleClass('ac'); 
          
        }, false);
      });
    }
// toggle menu -------------------

// nice select --------------------
$(document).ready(function() {
  $('.nice-select').niceSelect();
  $(".order-news, .medical-units-letters").change(function(){
    location.href = $(this).val();
  });
  $("#unitSelect").change(function(){
    $("#doctorsFilterForm").submit();
  });
});  
// nice select --------------------
 
// page active --------------------
$(document).ready(function(){
  $(function($) {
     var path = window.location.href;
     $('.menu .navbar .links ul li.list_item a').each(function() {
     if (this.href === path) {
        $(this).addClass('active');
     }
     });
  });
});
// page active --------------------
 
// main menu  --------------------
$(".header .upper .menu-btn button").click(function(){
	$('body').addClass('menu-active');
});
$(".menu-section .sidebar .content .topsec .close button").click(function(){
  $('body').removeClass('menu-active');
});
$(".dismiss-menu").click(function(){
  $('body').removeClass('menu-active');
});
// main menu  --------------------

// program  --------------------
$(".program-section .points ul li .icon .con").hover(function(){
	$(this).parents('li').addClass('active');
},function () {
	$(this).parents('li').removeClass('active');
  
}
); 
// program  --------------------

 



// input number  --------------------
$(function(){
  $(".phone-code").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
  //    $("#errmsg").html("Number Only").stop().show().fadeOut("slow");
      return false;
    }
  });
}); 
  
$(document).ready(function(){
  $(".phone-code").intlTelInput({
      utilsScript: "/lib/intl-tel-input-master/build/js/utils.js",
     initialCountry: "tr",
     preferredCountries: ["tr"]
  });

  $(".formWithPhone").submit(function(e){
      var phoneField = $(this).find('.phone-code');
      var iti = phoneField.data('plugin_intlTelInput');
      if(iti.isValidNumber()){
        $(this).find(".phone-field").val(iti.getNumber());
      }else{
        e.preventDefault();
        phoneField.addClass('is-invalid');
        phoneField.keyup(function(){
          var iti = phoneField.data('plugin_intlTelInput');
          if(iti.isValidNumber())
            phoneField.removeClass('is-invalid');
          else
            phoneField.addClass('is-invalid');
        });
      }

  });
});

  // input number  --------------------



  
// show more text  -------------------- 
 
$(document).ready(function () {  
  $(".evde-saglik .saglik-content .services .boxes .item .content .text button").click(function(){
    $(this).parents('.item').toggleClass('active');
  });
});
// show more text  --------------------


// fixed-letters
$(window).scroll(function() {
  if ($(this).scrollTop() > 1) { 
    $('.fixed-letters').addClass('active');
  } else { 
    $('.fixed-letters').removeClass('active');

  }
}); 
// fixed-letters


// slider like button  -------------------- 
$(document).ready(function () {  
  $(".heade-social-media ul li.socialmedia-list button").click(function(){
    $(this).parents('.socialmedia-list').toggleClass('active');
  });
});
// slider like button  --------------------

// slider acil tip  -------------------- 
// $(document).ready(function () {  
//   $(".aciltip button").click(function(){
//     $(this).toggleClass('active');
//   });

// var owl = $('#aciltipslider');
// owl.owlCarousel();
// // Listen to owl events:
// owl.on('changed.owl.carousel', function(event) {
//   $(this).find('.item .content').toggleClass('active');
// })
// });


// slider acil tip  --------------------

// intro  --------------------
$(document).ready(function () {  
  $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
  });
  $(".intro-section").delay(4100).fadeOut(600);
});
  
// intro  --------------------


// OWL CAROUSELS INIT --------------------------------

$(document).ready(function () {
  if ($('#slider-mobil').length > 0)
      $('#slider-mobil').owlCarousel({
          lazyLoad: true,
          dots: false,
          loop: true,
          rtl: document.documentElement.getAttribute('dir') == "rtl",
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: true, // Show next and prev buttons
          dots: true,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          animateOut: 'fadeOut',
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 3,
              },
              600: {
                  items: 3,

              },
              1000: {
                  items: 3,
              }
          }
      });

  if ($('#aciltipslider').length > 0)
      $('#aciltipslider').owlCarousel({
          lazyLoad: true,
          dots: false,
          loop: true,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 4000,
          nav: false, // Show next and prev buttons
          dots: false,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          animateOut: 'fadeOut',
          responsiveClass: true,
          mouseDrag: false,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              1000: {
                  items: 1,
              }
          }
      });

  if ($('#slider').length > 0)
      $('#slider').owlCarousel({
          lazyLoad: true,
          rtl: document.documentElement.getAttribute('dir') == "rtl",
          loop: true,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: true, // Show next and prev buttons
          dots: true,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          animateOut: 'fadeOut',
          responsiveClass: true,
          mouseDrag: false,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              1000: {
                  items: 1,
              }
          }
      });


  if ($('#blogslider').length > 0)
      $('#blogslider').owlCarousel({
          lazyLoad: true,
          dots: false,
          loop: true,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: true, // Show next and prev buttons
          dots: false,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              1000: {
                  items: 1,
              }
          }
      });
      if ($('#campaignslider').length > 0)
      $('#campaignslider').owlCarousel({
          lazyLoad: true,
          dots: false,
          loop: true,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: true, // Show next and prev buttons
          dots: false,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              1000: {
                  items: 1,
              }
          }
      });
  

  if ($('#blogsitem').length > 0)
      $('#blogsitem').owlCarousel({
          lazyLoad: true,
          dots: false,
          loop: true,
          rtl: document.documentElement.getAttribute('dir') == "rtl",
          margin: 20,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: false, // Show next and prev buttons
          dots: false,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,
              },
              768: {
                  items: 2,
              },
              1000: {
                  items: 3,
              }
          }
      });

  if ($('#linksbanner').length > 0)
      $('#linksbanner').owlCarousel({
          lazyLoad: true,
          rtl: document.documentElement.getAttribute('dir') == "rtl",
          dots: false,
          loop: false,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: false, // Show next and prev buttons
          dots: true,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              768: {
                  items: 3,

              },
              1000: {
                  items: 5,
              },
              1200: {
                  items: 6,
              }
          }
      });
      
  if ($('#hastahikaye').length > 0)
      $('#hastahikaye').owlCarousel({
          lazyLoad: true,
          dots: false,
          rtl: document.documentElement.getAttribute('dir') == "rtl",
          loop: true,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 6000,
          nav: true, // Show next and prev buttons
          dots: false,
          slideSpeed: 500,
          autoplayHoverPause: true,
          smartSpeed: 1000,
          singleItem: true,
          responsiveClass: true,
          mouseDrag: true,
          navText: [
              "<i class='fa-solid fa-chevron-left'></i>",
              "<i class='fa-solid fa-chevron-right'></i>"
          ],
          responsive: {
              0: {
                  items: 1,
              },
              600: {
                  items: 1,

              },
              768: {
                  items: 1,
              },
              992: {
                  items: 2,
              },
              1000: {
                  items: 2,
              }
          }
      });
  if ($('#blog-sm-slider').length > 0)
    $('#blog-sm-slider').owlCarousel({
        dots: false,
        loop: true,
        rtl: document.documentElement.getAttribute('dir') == "rtl",
        margin: 0,
        autoplay: true,
        autoplayTimeout: 6000,
        nav: false, // Show next and prev buttons
        dots: false,
        slideSpeed: 500,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        singleItem: true,
        responsiveClass: true,
        mouseDrag: true,
        navText: [
          "<i class='fa-solid fa-chevron-left'></i>",
          "<i class='fa-solid fa-chevron-right'></i>"
        ],
        responsive: {
          0: {
              items: 1,
          },
          600: {
              items: 1,

          },
          768: {
              items: 2,

          },
          1000: {
              items: 2,
          }
        }
    });
  if ($('#tup-bebek').length > 0)
    $('#tup-bebek').owlCarousel({
      dots: false,
      loop: true,
      rtl: document.documentElement.getAttribute('dir') == "rtl",
      margin: 0,
      autoplay: true,
      autoplayTimeout: 6000,
      nav: true, // Show next and prev buttons
      dots: false,
      slideSpeed: 500,
      autoplayHoverPause: true,
      smartSpeed: 1000,
      singleItem: true,
      responsiveClass: true,
      mouseDrag: true,
      navText: [
          "<i class='fa-solid fa-chevron-left'></i>",
          "<i class='fa-solid fa-chevron-right'></i>"
      ],
      responsive: {
          0: {
              items: 1,
          },
          600: {
              items: 1,

          },
          768: {
              items: 2,

          },
          1000: {
              items: 2,
          }
      }
  });
});


// CUSTOM FUCTIONS ----------------

function toggleRequired(element) {
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('email');
  
  nameInput.required = !element.checked;
  emailInput.required = !element.checked;
}

$(window).ready(function(){
    if($(".pdf-button").length > 0)
    changeDocumentsLinksOnMobile();
});

function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
  
    // Windows Phone must come first because its UA also contains "Android"
    if (/windows phone/i.test(userAgent)) {
        return "Windows Phone";
    }
  
    if (/android/i.test(userAgent)) {
        return "Android";
    }
  
    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }
  
    return "unknown";
  }
  
  function changeDocumentsLinksOnMobile() {
    if (getMobileOperatingSystem() === "Android" || getMobileOperatingSystem() === "iOS") {
            $(".pdf-button").each(function(){
                var a = $(this);
                a.removeAttr('data-fancybox');
                a.attr('target', '_blank');
            });
    }
  }