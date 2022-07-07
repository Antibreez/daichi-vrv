<main class="page content">

    <!-- 404 -->
    <section class="not-found">
        <h1>Такой страницы не&nbsp;существует</h1>
        <div class="not-found__text">Вернуться <a href="/" class="blue">на главную</a> или воспользоваться формой&nbsp;поиска:</div>
        <?$APPLICATION->IncludeComponent("bitrix:search.form", "not_found", Array(
                "PAGE" => "#SITE_DIR#search/index.php",
                "USE_SUGGEST" => "Y",
            )
        );?>
    </section>
    <!-- /404 -->

</main><!-- END page -->