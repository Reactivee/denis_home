<section>
    <div class="contact py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 py-2 text-center text-md-left">
                    <h3 class="section_title my-3 color_white">
                        <?= Yii::t('main', 'answers') ?>

                    </h3>
                    <p class="section_text pr-0 pr-md-5 color_white">

                        <?= Yii::t('main', 'request_text') ?>
                    </p>
                    <form id="sendApp" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control my-3 bg_input_trans" placeholder=  '<?= Yii::t('main', 'email') ?>'
                                       type="email" name="email">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control my-3 bg_input_trans" placeholder=  '<?= Yii::t('main', 'phone') ?>'
                                       type="phone" name="phone">
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control bg_input_trans" placeholder=  '<?= Yii::t('main', 'textarea') ?>'
                                          name="text" id="" cols="30" rows="10"></textarea>
                                <button class="w-100 btn bg_color_yel py-2 mt-4 font-weight-bolder">
                                    <?= Yii::t('main', 'send_sms') ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 ">
                    <div class="contact_info h-100 d-flex flex-column justify-content-around">
                        <div class="pb-3 pr-md-0">
                            <div class="info_title color_white">
                                <span><?= Yii::t('main', 'how_connect') ?> </span>
                            </div>
                            <div class="info_text color_white">
<!--                                <span>--><?//= Yii::t('main', 'how_connect_text') ?><!--</span>-->
                            </div>
                        </div>
                        <div class="info_block">
                            <div class="info_item d-flex align-items-center">
                                <div class="info_icon mr-3">
                                    <img src="/frontend/web/uploads/icons/con1.svg" alt="asd">
                                </div>
                                <div class="info_item_content ">
                                    <div class="info_item_text_title color_gray mb-2">
                                      <?= Yii::t('main', 'address') ?>
                                    </div>
                                    <div class="info_item_text_text color_white">
                                        <?= $address['address_' . Yii::$app->language] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="info_item d-flex align-items-center mt-3">
                                <div class="info_icon mr-3">
                                    <img src="/frontend/web/uploads/icons/cont2.svg" alt="asd">
                                </div>
                                <div class="info_item_content ">
                                    <div class="info_item_text_title color_gray mb-2">
                                      <?= Yii::t('main', 'fax') ?>
                                    </div>
                                    <div class="info_item_text_text color_white">
                                        <?= $address['fax'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="info_item d-flex align-items-center mt-3">
                                <div class="info_icon mr-3">
                                    <img src="/frontend/web/uploads/icons/cont3.svg" alt="asd">
                                </div>
                                <div class="info_item_content ">
                                    <div class="info_item_text_title color_gray mb-2">
                                      <?= Yii::t('main', 'phone') ?>
                                    </div>
                                    <div class="info_item_text_text color_white">
                                        <?= $address['phone']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="info_item d-flex align-items-center mt-3">
                                <div class="info_icon mr-3">
                                    <img src="/frontend/web/uploads/icons/cont4.svg" alt="asd">
                                </div>
                                <div class="info_item_content ">
                                    <div class="info_item_text_title color_gray mb-2">
                                        <?= Yii::t('main', 'email') ?>
                                    </div>
                                    <div class="info_item_text_text color_white">
                                        <?= $address['email']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
