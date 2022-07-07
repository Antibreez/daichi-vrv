<div class="prod-tab product__tabs-item js-tabs-item" id="manual">
    <a class="prod-tab__spoiler-btn js-prod-tab-spoiler" role="button">Документация</a>
    <div class="prod-tab__spoiler-content js-spoiler-body">

        <h2 class="prod-tab__title">Инструкции и сертификаты</h2>

        <ul class="docs-list prod-tab__docs">
            <?foreach ($arResult['PROPERTIES']['DOCUMENTS'] as $DOCUMENT):?>
                <li class="docs-list__item">
                    <i class="docs-list__icon <?=getFileIcon($DOCUMENT['EXT'])?>"></i>
                    <div class="docs-list__text">
                        <div class="docs-list__name"><?=$DOCUMENT['UF_NAME']?></div>
                        <div class="docs-list__note"><?=getFileSizeText($_SERVER['DOCUMENT_ROOT'] . $DOCUMENT['FILE'])?>, <?=strtoupper($DOCUMENT['EXT'])?></div>
                    </div>
                    <div class="docs-list__btns">
                        <a class="docs-list__btn icon-btn-load" href="/catalog/documentation/?ID=<?=$DOCUMENT['ID']?>" download></a>
                        <?if ($DOCUMENT['EXT'] == 'pdf'):?>
                            <a class="docs-list__btn icon-btn-view" href="<?=$DOCUMENT['FILE']?>" target="_blank"></a>
                            <!-- /download/?ID=<?=$DOCUMENT['UF_DOCUMENT_FILE']?> -->
                        <?endif;?>
                    </div>
                </li>
            <?endforeach;?>
        </ul>

    </div><!-- END prod-tab__spoiler-content -->
</div><!-- END product__tabs-item #prod_manual -->