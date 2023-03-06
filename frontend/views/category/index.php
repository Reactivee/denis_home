<?php use yii\bootstrap4\Breadcrumbs;

$this->params['breadcrumbs'][] = $this->title;

?>
<section class=" gray_bg">
    <div class="container">
        <div class="product_view">
            <div class="row">
                <div class="col-md-4">
                    <div class="card_view h-100 bg-white px-3 py-4 d-flex flex-column justify-content-between">
                        <div class="top_block_card_view">
                            <h2 class="card_view_title color_gray"><?= $estate->title_tr ?></h2>
                            <h5 class="card_view_city color_gray"><?= $estate->city->title_tr . " , " . $estate->region->name_tr . "  , " . $estate->address ?></h5>
                            <div class="view_price d-flex align-items-center justify-content-between">
                                <span class="color_gray">от <span class="price">130 500$</span> </span>
                                <div class="currency d-flex align-items-center">
                                    <span class="currency_item active">USD</span>
                                    <span class="currency_item ">EUR</span>
                                    <span class="currency_item ">RUB</span>
                                </div>
                            </div>
                            <div class="view_options w-100">
                                <ul class="list-unstyled color_gray">
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Класс жилья:</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">Премиум</span>
                                        </div>
                                    </li>
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Срок сдачи::</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">2023 г, IV квартал</span>
                                        </div>
                                    </li>
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Отделка::</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">Черновая</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn  main_btn px-5 ">Выбрать планировку</button>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <!-- Swiper -->
                    <div class="swiper view_card">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="w-100" src="/uploads/cards/image%208.png" alt="">
                            </div>
                            <div class="swiper-slide"><img class="w-100" src="/uploads/cards/image%208.png" alt="">
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="room_plans bg-white container mt-5 py-4 px-4">
            <div class="main_title">
                <div class="products_title color_gray f-32">Цены и планировки</div>
            </div>
            <div class="accordion product_view_accordion mt-4" id="accordionExample">
                <!--Items accordion-->


                <? foreach ($estate->apartmentsGroup as $key => $item) { ?>
                    <div class="accordion-item product_view_accordion_item mt-4">
                        <div class="accordion-header" id="headingOne">
                            <div class="accordion-button d-flex justify-content-between" data-bs-toggle="collapse"
                                 data-bs-target="#collapseOne"
                                 aria-expanded="true" aria-controls="collapseOne">
                                <div class="view_room product_view_accordion_title">
                                    <span><?= $key ?> -комнатные</span>
                                </div>
                                <div class="view_size">
                                    <span><?= $item[0]->area ?> -49 кв.М</span>
                                </div>
                                <div class="view_price">
                                    <span>от <?= $item[0]->price ?> USD</span>
                                </div>
                                <div class="view_price_size">
                                    <span>от 2300 USD за кв.М</span>
                                </div>
                                <div class="recommendes ">
                                    <span><?= count($item) ?> предложения</span>
                                </div>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body py-5">

                                <div class="row">
                                    <? foreach ($item as $element) { ?>
                                        <div class="col-md-4">
                                            <div class="card_flat ">
                                                <div class="card_flat_img ">
                                                    <img class="gray_heart" src="/uploads/icons/hear_gray.svg"
                                                         alt="heart">
                                                    <img class="white_heart" src="/uploads/icons/heart.svg" alt="heart">
                                                    <span class="overlay d-flex align-items-center justify-content-center">
                                                <img src="/uploads/icons/eye.svg" alt="">
                                            </span>
                                                    <img class="w-100" src="/uploads/cards/image_flat.png" alt="">
                                                </div>
                                                <div class="card_flat_content px-4 pb-4">
                                                    <div class="card_flat_price  color_gray font-weight-bold">
                                                        от <?= $element->price; ?>
                                                        USD
                                                    </div>
                                                    <div class="card_flat_desc color_gray "><?= $element->count_rooms ?>
                                                        -комнатная квартира, <?= $element->area ?>
                                                        кв.М
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                <? } ?>

            </div>

            <div class="located_block_wrapper mt-5">
                <div class="main_title">
                    <div class="products_title color_gray f-32">Расположение и инфраструктура</div>
                </div>
                <div class="options_block">
                    <div class="row">
                        <div class="view_options_column">
                            <div class="view_options w-100">
                                <ul class="list-unstyled color_gray">
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Класс жилья:</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">Премиум</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="view_options_column">
                            <div class="view_options w-100">
                                <ul class="list-unstyled color_gray">
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Класс жилья:</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">Премиум</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="view_options_column">
                            <div class="view_options w-100">
                                <ul class="list-unstyled color_gray">
                                    <li class="w-100 row">
                                        <div class="col-6">
                                            <span class="font-weight-bold w-50">Класс жилья:</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="w-50">Премиум</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="options_block_wrapper mt-5">
                <div class="main_title">
                    <div class="products_title color_gray f-32">Характеристика комплекса</div>
                </div>
                <div class="options_block">
                    <div class=" ">
                        <div class="view_options w-100">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="option_items  d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="option_items d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="option_items d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="option_items d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="option_items d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="option_items d-flex align-items-center">
                                        <div class="option_items_icon">
                                            <img src="/uploads/icon_options/option1.svg" alt="">
                                        </div>
                                        <div class="option_items_text">
                                            <p class="p-0 m-0 color_gray_more">класс жилья:</p>
                                            <span class="font-weight-bold w-50 color_gray">Премиум</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="descriptions mt-5">
                <div class="main_title">
                    <div class="products_title color_gray f-32">Описание недвижимости</div>
                </div>
                <div class="descriptions_wrapper">
                    <div class="descriptions_item">
                        <div class="main_title">
                            <div class="products_title color_gray f-32">Инвестиции в Стамбуле. Новостройки. Квартиры
                                премиум класса
                            </div>
                            <p>16-этажный жилой комплекс выполнен в классическом архитектурном стиле, по монолитному
                                типу. Имеется собственный 2-х уровневый подземный паркинг для всех жильцов, зеленый двор
                                с детскими игровыми площадками, а также круглосуточная охрана с видеонаблюдением. Все
                                подъезды оборудованы пассажирскими и грузовыми лифтами, а в каждой квартире будет
                                установлен собственный двухконтурный котел.</p>
                        </div>
                    </div>
                    <div class="descriptions_item">
                        <div class="main_title">
                            <div class="products_title color_gray f-32">Инвестиции в Стамбуле. Новостройки. Квартиры
                                премиум класса
                            </div>
                            <p>16-этажный жилой комплекс выполнен в классическом архитектурном стиле, по монолитному
                                типу. Имеется собственный 2-х уровневый подземный паркинг для всех жильцов, зеленый двор
                                с детскими игровыми площадками, а также круглосуточная охрана с видеонаблюдением. Все
                                подъезды оборудованы пассажирскими и грузовыми лифтами, а в каждой квартире будет
                                установлен собственный двухконтурный котел.</p>
                        </div>
                    </div>
                </div>
                <div class="tags descriptions_item_tags d-flex flex-wrap mt-4">
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
            </div>
        </div>
    </div>
</section>