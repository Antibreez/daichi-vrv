<?foreach ($arResult['menuItems'] as $one):?>
    <?if ($one["TEXT"] == "Оборудование" || $one["TEXT"] == "Купить"):?>
        <?continue;?>
    <?else:?>
        <li class="main-nav__item <?= $one["TEXT"] == 'О Компании' ? "": 'header-desktophide';?>">
            <a class="main-nav__link" href="<?=MAIN_DAICHI_URL?><?= $one["LINK"];?>"><?= $one["TEXT"];?></a>
        </li>
    <?endif;?>
<?endforeach;?>
