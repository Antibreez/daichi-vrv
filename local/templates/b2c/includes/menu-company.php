<?
/** @var string $isActive ключи активной страницы */
$arItems = [
    ['name' => 'Пресс-центр',        'link' => '/news/',        'key' => 'news'],
    ['name' => 'История',           'link' => '/history/',      'key' => 'history'],
    ['name' => 'Структура',         'link' => '/structure/',    'key' => 'structure'],
    ['name' => 'Поставщики',          'link' => '/partners/',     'key' => 'partners'],
    ['name' => 'Галерея',           'link' => '/gallery/',      'key' => 'gallery'],
    ['name' => 'Филиалы', 'link' => '/offices/',      'key' => 'offices'],
    ['name' => 'Объекты',           'link' => '/object/',       'key' => 'object'],
    ['name' => 'Вакансии',           'link' => '/career/',       'key' => 'career'],
    /**['name' => 'Шоу-рум',           'link' => '/show-room/',    'key' => 'show-room'] */
];
?>
<!-- SIDE NAV -->
<nav class="top-menu <?=$nav_class?>">
    <div class="container">
        <ul>
            <?foreach ($arItems as $item):?>
                <li <?if($isActive == $item['key']):?>class="active"<?endif;?>><a href="<?=$item['link']?>"><?=$item['name']?></a></li>
            <?endforeach;?>
        </ul>
    </div>
</nav>
<!-- /SIDE NAV -->