<?php
/** @var yii\web\View $this */
/** @var \common\models\Advantages $advantages */
$this->title = 'My Yii Application';

//\Yii::$app->language = 'ru-RU';
?>
    <style>
        .slideshow {
            margin: 0 auto;
            padding-top: 50px;
            height: 439px;
            perspective: 1000px;
        }

        .content {
            margin: auto;
            width: 209px;
            perspective: 1000px;
            position: relative;
            padding-top: 80px;
            transform-style: preserve-3d;
        }

        .slider-content {
            width: 100%;
            position: absolute;
            float: right;
            animation: rotate 20s infinite linear;
            transform-style: preserve-3d;
        }

        .slider-content:hover {
            cursor: pointer;
            animation-play-state: paused;
        }

        .slider-content figure {
            width: 180px;
            height: 120px;
            border: 1px solid #555;
            overflow: hidden;
            position: absolute;
        }

        .slider-content img {
            image-rendering: auto;
            transition: all 300ms;
            width: 100%;
            height: 100%;
        }

        .slider-content img:hover {
            transform: scale(1.2);
            transition: all 300ms;
        }

        .shadow {
            position: absolute;
            box-shadow: 0px 0px 0px #000;
        }

        .slider-content figure:nth-child(1) {
            transform: rotateY(0deg) translateZ(300px);
        }

        .slider-content figure:nth-child(2) {
            transform: rotateY(40deg) translateZ(300px);
        }

        .slider-content figure:nth-child(3) {
            transform: rotateY(80deg) translateZ(300px);
        }

        .slider-content figure:nth-child(4) {
            transform: rotateY(120deg) translateZ(300px);
        }

        .slider-content figure:nth-child(5) {
            transform: rotateY(160deg) translateZ(300px);
        }

        .slider-content figure:nth-child(6) {
            transform: rotateY(200deg) translateZ(300px);
        }

        .slider-content figure:nth-child(7) {
            transform: rotateY(240deg) translateZ(300px);
        }

        .slider-content figure:nth-child(8) {
            transform: rotateY(280deg) translateZ(300px);
        }

        .slider-content figure:nth-child(9) {
            transform: rotateY(320deg) translateZ(300px);
        }

        @keyframes rotate {
            from {
                transform: rotateY(0deg);
            }
            to {
                transform: rotateY(360deg);
            }
        }
    </style>

    <section>
        <div class="advantages mt-5">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-9">
                        <div class="advantages__content text-center text-md-left" data-aos="fade-right"
                             data-aos-easing="ease-in-sine"
                             data-aos-duration="1000">
                            <!--                        <span class="section_label my-5">Посмотрите</span>-->
                            <h3 class="section_title my-3 color_white">
<!--                                --><?//= $advantages['title_' . \Yii::$app->language] ?>
                            </h3>
                            <p class="section_text pr-0 pr-md-5 color_white text-center text-md-left">
<!--                                --><?//= $advantages['text_' . \Yii::$app->language] ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
