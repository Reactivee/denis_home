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
<div class="faq">
    <div class="inner_banner">
        <div class="container">
            <div class="inner_banner_text">
                <div class="title_overlay">
                    <p>FAQ</p>
                    <span>Найдите ответы на часто задаваемые вопросы</span>
                </div>
                <div class="text_overlay"></div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="accordion " id="accordionPanelsStayOpenExample">
                    <div class="accordion-item ">

                        <h2 class="accordion-header d-flex" id="panelsStayOpen-headingOne">
                            <div class="accordion-button accordion-button_faq color_gray font-weight-bold"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae?
                            </div>
                        </h2>

                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                             aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                Aliquam egestas dictum lacus, at efficitur nunc vestibulum at. Donec vestibulum ante nec
                                libero suscipit pulvinar eu at magna. Sed pulvinar sapien sapien, a commodo sapien
                                ultricies eget. Phasellus ac blandit mi.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_form">
                    <div class="contact_form_title color_white">
                        <p>Остались еще вопросы?</p>
                        <span>Aliquam egestas dictum lacus, at efficitur nunc vestibulum at.
                            Donec vestibulum ante nec libero suscipit pulvinar eu at magna. Sed pulvinar sapien sapien,
                            a commodo sapien ultricies eget. Phasellus ac blandit mi.</span>
                    </div>
                    <div class="contact_form_btn">
                        <button class="btn btn_faq">Свзязать с нами</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
