<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="header-search"> 
    <form method="GET" action="/search/new.php" id="search-form-desktop" class="header-search__form" style="display: none;">
        <button type="submit" class="header-search__search-btn btn btn_link"><span class="icon icon-search active"></span></button>
        <input type="text" placeholder="Что Вы ищете?" name="q">
        <button type="button" class="header-search__close-btn btn btn_link" data-visibility="show" data-show="#show-search-desktop" data-hide="#search-form-desktop" data-queue="show">
            <span class="icon icon-cross"></span>
        </button>
        <div id="offers" class="search-results is-active">
            <div id="popular-block" class="search-results-item">
                <p style="display: none;" class="search-results__category">Популярное</p>
            </div>

            <div id="category-block" class="search-results-item">
                <p style="display: none;" class="search-results__category">Категории</p>
            </div>

            <div id="articles-block" class="search-results-item">
                <p style="display: none;" class="search-results__category">Статьи</p>
            </div>
        </div>
    </form>

    <button id="show-search-desktop" type="button" class="header-search__show-btn btn btn_link mb0" data-visibility="show" data-show="#search-form-desktop" data-hide="#show-search-desktop" data-queue="show">
        <span class="icon icon-search"></span>
    </button>
</div>