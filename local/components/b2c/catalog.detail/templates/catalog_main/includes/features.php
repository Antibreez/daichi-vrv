<div class="prod-tab product__tabs-item js-tabs-item" id="features">
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler js-all-features-mobile" role="button">Особенности</a>

    <div class="prod-tab__spoiler-content js-spoiler-body">
        <div class="prod-tab__main for-prod-props">
            <h2 class="prod-tab__title">Все особенности</h2>
            <ul class="features-list features-list_for-product prod-desc__features-list">
                <?foreach ($images as $img):?>
                    <li class="features-list__item">
                        <img src="<?=$img['IMAGE']?>" alt="" class="features-list__icon-img">
                        <span class="features-list__title"><?=$img['NAME']?></span>
                        <p class="features-list__hint"><?=$img['TEXT']?></p>
                    </li>
                <?endforeach;?>

            </ul>
        <!-- END prod-tab__main -->
        </div>
        <!-- END prod-tab__spoiler-content -->
    </div>
    <!-- END product__tabs-item #prod_features -->
</div>