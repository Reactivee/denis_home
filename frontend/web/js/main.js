/* Please ❤ this if you like it! */

AOS.init();
(function ($) {
    "use strict";

    $(function () {
        var header = $(".start-style");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 200) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });

    //Animation
    $(document).ready(function () {
        $('body.hero-anime').removeClass('hero-anime');
    });

    //Menu On Hover

    $('body').on('mouseenter mouseleave', '.nav-item', function (e) {
        if ($(window).width() > 750) {
            var _d = $(e.target).closest('.nav-item');
            _d.addClass('show');
            setTimeout(function () {
                _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 1);
        }
    });


})(jQuery);

let swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
let swiperview = new Swiper(".viewSwiper", {
    // direction: "vertical",
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    // loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        clickable: true,
    },

});
let similarSlider = new Swiper(".similar_slider", {
    // direction: "vertical",
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 1,
    // loop: true,
    breakpoints: {
        640: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

});

let gallery_slider = new Swiper(".gallery_slider", {
    // direction: "vertical",
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    // loop: true,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

});

const showImg = (e) => {
    const imgPath = e.children[0].src;
    const img = e.children[0];
    const allImg = document.querySelectorAll('.small_item_img');
    for (const imgPathElement of allImg) {
        imgPathElement.classList.remove("active");
    }
    img.classList.add("active");
    const bigImg = document.querySelector('.big_img_view_img')
    const bigImg_demo = document.querySelector('.demo_big')
    bigImg.src = imgPath;
    bigImg_demo.href = imgPath;
}

const showFilfer = (e) => {

    let block = document.querySelector('.filter_block');
    block.classList.toggle("filter_block_show");

}
lightbox.option({
    alwaysShowNavOnTouchDevices: true,
    fadeDuration: 600,
    fitImagesInViewport: true,
    imageFadeDuration: 600,
    positionFromTop: 150,
    resizeDuration: 700,
    showImageNumberLabel: false,
    wrapAround: true, // If true, when a user reaches the last image in a set, the right navigation arrow will appear and they will be to continue moving forward which will take them back to the first image in the set.


})
var mybutton = document.getElementById("myBtn");

window.onscroll = () => {
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > 500) {
        mybutton.style.display = "block";
    } else if (scrollTop < 15) {
        mybutton.style.display = "none";

    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

$("#sendApp").submit(function (e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: '/site/send-request',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            alert("Successfully sent");
            this.reload()
        }
    });

});
