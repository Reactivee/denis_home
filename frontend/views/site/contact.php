<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="container">
        <div class="section-search_title mt-5">
            <h2 class="color_gray font-weight-bolder text-left">Наши контакты</h2>
        </div>
        <div class="card contact_wrap bg-white mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="info_address">
                        <div class="contact_address d-flex align-items-center">
                            <i class="fa-solid fa-location-dot mr-3 color_gray"></i>
                            <div class="contact_address_title  ">
                                <span class="color_gray font-weight-bold">  г. Ipsum</span>
                                <div class="contact_address_text color_gray">
                                    ул. Lorem Ipsum, 2
                                </div>
                            </div>
                        </div>

                        <div class="contact_address">
                            <i class="fa-sharp fa-solid fa-phone-volume color_gray mr-3"></i>
                            <div class="contact_address_text">
                                <a class="text-decoration-none color_gray font-weight-bold" href="">
                                    +90 534 052 62 36
                                </a>
                            </div>
                        </div>
                        <div class="contact_address">
                            <i class="fa-sharp fa-solid fa-phone-volume color_gray mr-3"></i>


                            <div class="">
                                <span class="contact_address_title font-weight-bold color_gray">Пн-Пт</span>
                                <div class="contact_address_text color_gray">
                                    9:00 до 19:00
                                </div>
                            </div>

                        </div>
                        <div class="contact_address">
                            <i class="fa-sharp fa-solid fa-envelope color_gray mr-3"></i>
                            <div class="contact_address_text color_gray font-weight-bold">
                                gulan@denizhomes.com
                            </div>
                        </div>

                        <div class="contact_info">
                            <div class="info_title">
                                <h4 class="color_gray"> Реквизиты компании</h4>
                            </div>
                            <div class="info_text">
                                <span class="font-weight-bold color_gray">Название компании:</span>
                                <span class="color_gray">DENİZ HOMES EMLAK GAYRİMENKUL DEĞERLEME VE YATIRIM DANIŞMANLIĞI ANONİM ŞİRKETİ</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-8">

                    <div class="map_wrapper">

                    </div>

                    <div class="social_icons d-flex align-items-center">
                        <h4 class="social_title color_gray font-weight-bold">Мы в соц.сетях</h4>
                        <div class="social_icons">
                            <div class="team_card_social d-flex align-items-center card_social justify-content-center">
                                <i class="fab fa-twitter"></i>
                                <i class="fab fa-facebook-f"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
