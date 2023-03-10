<header class="header  main_back">
    <ul class="nav d-flex justify-content-end container align-items-center">
        <li class="nav-item header_social icon_little d-flex align-items-center">
            <i class="fab fa-twitter "></i>
            <a class="nav-link color_white f-16 pl-0" href="tel:+905340526236">+90 534 052 62 36</a>
        </li>
        <li class="nav-item icon_little header_social d-flex align-items-center">
            <i class="fab fa-twitter "></i>
            <a class="nav-link f-16 color_white pl-0" href="#">USD</a>
        </li>
        <li class="nav-item header_social">
            <div class="lang">
                <div class="dropdown">
                    <?= \lajax\languagepicker\widgets\LanguagePicker::widget([
                        'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
                        'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_SMALL
                    ]); ?>
                </div>
            </div>
            <!--            <a class="nav-link f-16 color_white" href="#">Русский</a>-->
        </li>
    </ul>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">
                <img src="/uploads/logo/logo.svg" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                <ul class="navbar-nav main_nav">
                    <li class="nav-item active">
                        <a class="nav-link color_gray" href="#">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color_gray" href="/site/about">О нас</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  color_gray" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Наши услуги
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  color_gray" href="/category">Недвижимость</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  color_gray" href="/site/contact">Наши контакты</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  color_gray" href="/site/faq">FAQ</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>