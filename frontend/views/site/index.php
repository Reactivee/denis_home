<?php

use yii\jui\SliderInput;
use yii\web\View;

$this->title = 'Main page';

//\Yii::$app->language = 'ru-RU';
?>
    <section class="">
        <div class="main_banner">

            <!-- Swiper -->
            <div class="swiper banner">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <img class="w-100 main_banner" src="/uploads/banners/1banner.png" alt="asd">
                        <div class="banner_context">
                            <h4 class="banner_context_title">Смарт инвестиции в недвижимость</h4>
                            <h5 class="banner_context_text">Высокая доходность и выгодный возврат инвестиций</h5>
                        </div>

                    </div>
                    <div class="swiper-slide"><img class="w-100 main_banner" src="/uploads/banners/baner.png" alt="asd">

                    </div>

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="container ">
                <div class="row">

                </div>
            </div>
        </div>
    </section>
    <section class="section-search">
        <div class="section-search_title mt-5">
            <h2 class="color_gray font-weight-bolder text-center">Найдите свою идеальную недвижимость</h2>
        </div>
        <div class="searching_tools container mt-4 px-0">
            <form id="filter" action="">
                <!--Dropdown block-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="searching_tools_dropdown w-100 d-flex align-items-center">
                            <i class="fa-solid fa-bag-shopping ml-4 color_gray"></i>
                            <button class="btn  dropdown-toggle w-100 color_gray" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Выберите категорию сделки
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="searching_tools_dropdown d-flex align-items-center">
                            <i class="fa-solid fa-bag-shopping ml-4 color_gray"></i>
                            <button class="btn  dropdown-toggle w-100 color_gray" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Выберите тип недвижимости
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="searching_tools_dropdown d-flex align-items-center ">
                            <i class="fa-solid fa-bag-shopping ml-4 color_gray"></i>
                            <button class="btn  dropdown-toggle w-100 color_gray" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Выберите регион недвижимости
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="mt-4 d-flex justify-content-start flex-wrap mx-0">
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox_block">
                            <label class="color_gray position-relative checkbox_block_container">
                                Надалеко от моря
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="color_gray price_input_label" for="">Цена за кв.м от</label>
                                <input id="pricemin" class="form-control price_input">
                            </div>
                            <div class="col-md-6">
                                <label class="color_gray price_input_label" for="">Цена за кв.м до</label>
                                <input id="pricemax" class="form-control price_input">
                            </div>
                            <!--                        <span id="pricerange_tooltip"></span>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Bar Chart -->
                        <div class="position-relative overflow-hidden" style="height: 100px;">
                            <div class=" w-100 overflow-hidden">
                                <div style="height: 100px;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
                  "datasets": [{
                    "data": [2, 3, 5, 7, 8, 5, 3, 2, 3, 6, 5, 4, 7, 5, 4, 3, 2],
                    "backgroundColor": "#e7eaf3",
                    "borderColor": "#e7eaf3"
                  }]
                },
                "options": {
                  "scales": {
                    "yAxes": [{
                      "display": false,
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      },
                      "ticks": {
                        "beginAtZero": true
                      }
                    }],
                    "xAxes": [{
                      "display": false,
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      }
                    }]
                  },
                  "tooltips": {
                    "custom": false
                  }
                }
              }'></canvas>
                                </div>
                            </div>

                            <div id="foregroundBarChartDoubleResult" class="overflow-hidden">
                                <div style="height: 100px;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""],
                  "datasets": [{
                    "data": [2, 3, 5, 7, 8, 5, 3, 2, 3, 6, 5, 4, 7, 5, 4, 3, 2],
                    "backgroundColor": "#377dff",
                    "borderColor": "#377dff"
                  }]
                },
                "options": {
                  "scales": {
                    "yAxes": [{
                      "display": false,
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      },
                      "ticks": {
                        "beginAtZero": true
                      }
                    }],
                    "xAxes": [{
                      "display": false,
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      }
                    }]
                  },
                  "tooltips": {
                    "custom": false
                  }
                }
              }'></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- End Bar Chart -->

                        <!-- Range Slider -->
                        <input class="js-ion-range-slider" type="text"
                               data-hs-ion-range-slider-options='{
         "type": "double",
         "extra_classes": "range-slider-custom",
         "min": 0,
         "max": 1000,
         "from": 250,
         "to": 750,
         "result_min_target_el": "#pricemin",
         "result_max_target_el": "#pricemax",
         "foreground_target_el": "#foregroundBarChartDoubleResult"
       }'>

                        <!-- End Range Slider -->

                    </div>
                </div>
                <div class="text-center my-5 ">
                    <button class="btn  main_btn px-5">Найти недвижимость</button>
                </div>
            </form>

        </div>

    </section>
    <section class="advantage">
        <div class="advantage_block text-center">
            <div class="main_title">
                <div class="products_title advantage_block_title f-40 text-center"> Наши преимущества</div>
                <div class="products_text advantage_block_text f-24 text-center">Более 100 объектов с гарантией
                    получение
                    гражданство
                </div>
            </div>

        </div>
    </section>
    <section class="products">
        <div class="container py-4">
            <div class="main_title">
                <div class="products_title color_gray f-40 text-center">Популярные жилые комплексы и аппартаменты</div>
                <div class="products_text color_gray f-24 text-center">Более 100 объектов с гарантией получение
                    гражданство
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="product_card  overflow-hidden">

                        <div class="img_wrapper p-0 m-0 position-relative overflow-hidden">
                            <img class="w-100  overflow-hidden h-100" src="/uploads/cards/card1.png" alt="card">
                            <div class="ribbon">
                                <span>Готов к сдаче</span>
                            </div>
                        </div>
                        <div class="context_wrapper bg-white p-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <h5 class="title_product color_gray">Жилой комплекс ULTIPLUS RESIDENCE</h5>
                                </div>

                                <div class="col-md-5">
                                    <div class="text-right color_gray"> от <span
                                                class="price_product  font-weight-bolder">130 500$</span></div>
                                </div>

                            </div>
                            <div class="all_city">
                                <span class="city color_gray">Kadiköy</span>
                                <span class="city color_gray">Kadiköy</span>
                                <span class="city color_gray">Kadiköy</span>
                            </div>
                            <div class="tags d-flex flex-wrap mt-2">
                                <div class="tag_item">
                                    <i class="fas fa-history mr-1"></i>
                                    <span>Рассрочка</span>
                                </div>
                                <div class="tag_item ">
                                    <i class="fas fa-history mr-1"></i>
                                    <span>У моря</span>
                                </div>
                                <div class="tag_item ">
                                    <i class="fas fa-history mr-1"></i>
                                    <span>Гражданство</span>
                                </div>
                                <div class="tag_item ">
                                    <i class="fas fa-history mr-1"></i>
                                    <span>Парковка</span>
                                </div>
                            </div>

                            <div class="product_footer">
                                <div class="product_footer__room_size color_gray d-flex justify-content-between">
                                    <div class="footer_item">
                                        <i class="fas fa-history mr-1"></i>
                                        1+0
                                    </div>
                                    <div class="footer_item">от 46,4 кВ.м до 51,1 кВ.м</div>
                                    <div class="footer_item">от 131 200$</div>
                                </div>
                                <div class="product_footer__room_size color_gray d-flex justify-content-between">
                                    <div class="footer_item">
                                        <i class="fas fa-history mr-1"></i>
                                        1+0
                                    </div>
                                    <div class="footer_item">от 46,4 кВ.м до 51,1 кВ.м</div>
                                    <div class="footer_item">от 131 200$</div>
                                </div>
                                <div class="product_footer__room_size color_gray d-flex justify-content-between">
                                    <div class="footer_item">
                                        <i class="fas fa-history mr-1"></i>
                                        1+0
                                    </div>
                                    <div class="footer_item">от 46,4 кВ.м до 51,1 кВ.м</div>
                                    <div class="footer_item">от 131 200$</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End product card-->
            </div>
            <div class="text-center my-5 ">
                <button class="btn  main_btn px-5">Смотреть все объекты</button>
            </div>
        </div>
    </section>

    <section class="advantage type_build">
        <div class="advantage_block text-center pt-5">
            <div class="main_title">
                <div class="products_title color_white f-40 text-center">Популярные жилые комплексы и аппартаменты</div>
                <div class="products_text color_white f-24 text-center">Более 100 объектов с гарантией получение
                    гражданство
                </div>
            </div>
        </div>
        <div class="type_buildings">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="type_buildings_item">
                            <i class="fas fa-building"></i>
                            <div class="type_buildings_item_text">
                                <span>Коммерческая недвижимость</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="type_buildings_item">
                            <i class="fas fa-building"></i>
                            <div class="type_buildings_item_text">
                                <span>Коммерческая недвижимость</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="type_buildings_item">
                            <i class="fas fa-building"></i>
                            <div class="type_buildings_item_text">
                                <span>Коммерческая недвижимость</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="type_buildings_item">
                            <i class="fas fa-building"></i>
                            <div class="type_buildings_item_text">
                                <span>Коммерческая недвижимость</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">

        <div class="container mt-5">
            <div class="main_title mt-4">
                <div class="products_title color_gray f-40 text-center">Мы работаем во всех популярных городах Турции
                </div>
                <div class="products_text color_gray f-24 text-center">Более 100 объектов с гарантией получение
                    гражданство
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="city_cards position-relative  overflow-hidden d-flex justify-content-center align-items-end text-center">
                        <div class="city_cards_img">
                            <img class="100" src="../uploads/cards/coastal-city-seen-from-above.png" alt="asd">
                        </div>
                        <div class="card_text overflow-hidden">
                            <h4>Стамбул</h4>
                            <p>45 объектов</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form">
        <div class="form_block d-flex align-items-center py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <div class="form_text">
                                <p class="p-0 m-0">Будем на связи!</p>
                                <span>Подпишитесь, чтобы быть в курсе свежих новостей и интересных предложений</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control" type="text" placeholder="ведите Ваш e-mail адрес">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_team">
        <div class="container">

            <div class="main_title mt-4">
                <div class="products_title color_gray f-40 text-center">Команда экспертов в сфере недвижимости</div>
                <div class="products_text color_gray f-24 text-center">Наши эксперты с радостью помогут Вам подобрать
                    оптимальный вариант, исходя из Ваших целе
                </div>
            </div>
            <div class=" mt-5">
                <!-- Swiper -->
                <div class="swiper team_slider">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="team_card text-center">
                                <div class="team_card_img">
                                    <img class="w-100" src="./uploads/team/69-1588069949362.jpg" alt="team">
                                </div>
                                <div class="team_card_content mt-4">
                                    <div class="team_card_title color_gray font-weight-bold f-24">
                                        Гюлан Дениз
                                    </div>
                                    <div class="team_card_text color_gray">Эксперт по недвижимости</div>
                                    <div class="team_card_phone mt-3"><i class="fas fa-phone-alt mr-3"></i> <a
                                                href="tel:+90 534 052 62 36">+90 534 052 62 36</a></div>
                                    <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="swiper-slide">

                            <div class="team_card text-center">
                                <div class="team_card_img">
                                    <img class="w-100" src="./uploads/team/69-1588069949362.jpg" alt="team">
                                </div>
                                <div class="team_card_content mt-4">
                                    <div class="team_card_title color_gray font-weight-bold f-24">
                                        Гюлан Дениз
                                    </div>
                                    <div class="team_card_text color_gray">Эксперт по недвижимости</div>
                                    <div class="team_card_phone mt-3"><i class="fas fa-phone-alt mr-3"></i> <a
                                                href="tel:+90 534 052 62 36">+90 534 052 62 36</a></div>
                                    <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="swiper-slide">

                            <div class="team_card text-center">
                                <div class="team_card_img">
                                    <img class="w-100" src="./uploads/team/69-1588069949362.jpg" alt="team">
                                </div>
                                <div class="team_card_content mt-4">
                                    <div class="team_card_title color_gray font-weight-bold f-24">
                                        Гюлан Дениз
                                    </div>
                                    <div class="team_card_text color_gray">Эксперт по недвижимости</div>
                                    <div class="team_card_phone mt-3"><i class="fas fa-phone-alt mr-3"></i> <a
                                                href="tel:+90 534 052 62 36">+90 534 052 62 36</a></div>
                                    <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="swiper-slide">

                            <div class="team_card text-center">
                                <div class="team_card_img">
                                    <img class="w-100" src="./uploads/team/69-1588069949362.jpg" alt="team">
                                </div>
                                <div class="team_card_content mt-4">
                                    <div class="team_card_title color_gray font-weight-bold f-24">
                                        Гюлан Дениз
                                    </div>
                                    <div class="team_card_text color_gray">Эксперт по недвижимости</div>
                                    <div class="team_card_phone mt-3"><i class="fas fa-phone-alt mr-3"></i> <a
                                                href="tel:+90 534 052 62 36">+90 534 052 62 36</a></div>
                                    <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="swiper-slide">

                            <div class="team_card text-center">
                                <div class="team_card_img">
                                    <img class="w-100" src="./uploads/team/69-1588069949362.jpg" alt="team">
                                </div>
                                <div class="team_card_content mt-4">
                                    <div class="team_card_title color_gray font-weight-bold f-24">
                                        Гюлан Дениз
                                    </div>
                                    <div class="team_card_text color_gray">Эксперт по недвижимости</div>
                                    <div class="team_card_phone mt-3"><i class="fas fa-phone-alt mr-3"></i> <a
                                                href="tel:+90 534 052 62 36">+90 534 052 62 36</a></div>
                                    <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>
    </section>


<?php
$script = <<<JS


JS;
$this->registerJs($script); ?>