<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="header-search">
    <form method="GET" action="/search/new.php" id="search-form" class="header-search__form" style="display: none;">
        <button type="submit" class="header-search__search-btn header-search__search-btn_mobile btn btn_link"><span class="icon icon-search"></span></button>
        <input type="text" placeholder="Что Вы ищете?" name="q">
        <button id="close-search" type="button" class="header-search__close-btn btn btn_link" data-visibility="show" data-show="#show-search" data-hide="#search-form" data-queue="show">
            <span class="icon icon-cross"></span>
        </button>
    </form>

    <button id="show-search" type="button" class="header-search__show-btn btn btn_link mb0" data-visibility="show" data-show="#search-form" data-hide="#show-search" data-queue="show">
        <span class="icon icon-search"></span>
    </button>
</div>