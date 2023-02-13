<div class="product_item">
    <div class="item_img">

        <img class="w-100" src="/frontend/web<?= $products->img->path ?>" alt="">
    </div>
    <div class="item_content pb-0">
        <div class="item_text">
            <span><?= $products['desc'] ?></span>
        </div>
    </div>

    <div class="item_content">

        <div class="item_btn ">
            <a class="btn w-100  py-2 ibtn_outline_yellow font-weight-bolder text-decoration-none stretched-link"
               href="/category/element?slug=<?= $products->id ?>">Подробнее</a>
        </div>
    </div>
</div>

