/* Please ❤ this if you like it! */

AOS.init();
/*baner swiper*/
var swiper = new Swiper(".banner", {
    pagination: {
        el: ".swiper-pagination",
        // type: "fraction",
        effect: "fade",

    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});