<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="footer__nav">

    <!-- <li><a href="#">Купить оборудование</a></li> -->

    <?foreach ($arResult as $one):?>
        <?if ($one["TEXT"] == "Оборудование" || $one["TEXT"] == "Купить"):?>
            <?continue;?>
        <?else:?>
            <li><a href="<?= $one["LINK"];?>"><?= $one["TEXT"];?></a></li>
        <?endif;?>
    <?endforeach;?>
</ul>
