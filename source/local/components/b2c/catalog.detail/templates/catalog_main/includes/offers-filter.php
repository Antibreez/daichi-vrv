<aside class="prod-tab__side for-prod-offers" id="js-catalog-side">
   <form class="filters prod-tab__filters" id="js-filter-offers-from-product-card" method="POST">
       <?foreach ($arResult['DEALER_FILTER'] as $parameter):?>
           <div class="filters__unit has-no-side-borders">
               <h5 class="filters__unit-title js-accordion-head is-open"><?= $parameter['NAME'];?></h5>
               <div class="filters__unit-body js-accordion-body">
                   <?$i = 0;?>
                   <?foreach ($parameter['VALUES'] as $key => $value):?>
                       <?if (is_string($value) && $value != ""):?>
                           <input type="checkbox" name="<?= $parameter['CODE'];?>" value="<?= $value;?>" id="offers-<?= $parameter['CODE'] . '_' . $i;?>">
                           <label for="offers-<?= $parameter['CODE'] . '_' . $i;?>"><?= ctype_digit($value) ? B2CCatalogDetailComponent::getValue($value) : $value;?></label>
                           <?$i++;?>
                       <?endif;?>
                   <?endforeach;?>
               </div>
           </div>
       <?endforeach;?>
        <div class="filters__unit has-no-borders">
            <div class="filters__unit-btns">
                <button class="btn btn_border btn_block" type="submit">Применить</button>
                <button class="filters__btn-clear" type="reset">Сбросить фильтры</button>
            </div>
        </div>
        <a class="filters__tooltip js-offers-filter-tooltip">
            <span class="filters__tooltip-wrapper">
                Подобрано <span id="js-offers-tooltip-count"></span>
                <br>
                <strong>Показать</strong>
            </span>
        </a>
    </form>
    <!-- END prod-tab__filters -->
</aside>