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

/*Chart price*/


    // =======================================================


<!-- JS Plugins Init. -->
$(".js-ion-range-slider").ionRangeSlider({
    skin: "round",
    type: "double",
    min: 0,
    max: 1000,
    from: 200,
    to: 1000,
    grid: false,
    grid_margin: true,
    grid_snap: true,
    // result_min_target_el: "#rangeSliderExampleDouble4MinResult",
    // result_max_target_el: "#rangeSliderExampleDouble4MaxResult",
    foreground_target_el: "#foregroundBarChartSingleResult",

    onStart: function (data) {
        $("#pricemin").val(data.from);
        $("#pricemax").val(data.to);
        // // Called right after range slider instance initialised
        //
        // console.log(data.input);        // jQuery-link to input
        // console.log(data.slider);       // jQuery-link to range sliders container
        // console.log(data.min, 'asd');          // MIN value
        // console.log(data.max, 'sd');          // MAX values
        // console.log(data.from);         // FROM value
        // console.log(data.from_percent); // FROM value in percent
        // console.log(data.from_value);   // FROM index in values array (if used)
        // console.log(data.to);           // TO value
        // console.log(data.to_percent);   // TO value in percent
        // console.log(data.to_value);     // TO index in values array (if used)
        // console.log(data.min_pretty, 'asd');   // MIN prettified (if used)
        // console.log(data.max_pretty, 'asd');   // MAX prettified (if used)
        // console.log(data.from_pretty);  // FROM prettified (if used)
        // console.log(data.to_pretty);    // TO prettified (if used)
    },

    onChange: function (data) {
        // Called every time handle position is changed
        $("#pricemin").val(data.from);
        $("#pricemax").val(data.to);
        // console.log(data.min, 'asd');          // MIN value
        // console.log(data.max, 'sd');
        // console.log(data.from);
        // console.log(data.from_value);
    },

    onFinish: function (data) {
        // Called then action is done and mouse is released
        $("#pricemin").val(data.from);
        $("#pricemax").val(data.to);
        // console.log(data.to);
    },

    onUpdate: function (data) {
        // Called then slider is changed using Update public method
        $("#pricemin").val(data.from);
        $("#pricemax").val(data.to);
        // console.log(data.from_percent);
    }
});

const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});