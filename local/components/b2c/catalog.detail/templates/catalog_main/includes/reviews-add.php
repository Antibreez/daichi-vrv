<div class="review-popup js-review-popup" id="add-review-popup">
    <div class="review-popup__inner">
        <h2 class="review-popup__title">Мой отзыв о товаре <?= ucfirst($arResult["PROPERTIES"]["BRAND"]["VALUE"]) . ' ' . $arResult["NAME"];?></h2>

        <form class="popup-review-form" id="catalog-good-review-add" data-validate="true">
            <input type="hidden" name="UF_PRODUCT_ID" value="<?=$arResult['ID']?>">
            <div class="popup-review-form__row">
                <div class="popup-review-form__column">
                    <label for="rating" class="popup-review-form__label">Моя оценка</label>

                    <div class="rating">
                        <input type="radio" id="star5" name="UF_RATING" class="rating__input" value="5" required/><label class="rating__label" for="star5" title="Отличная модель" data-rating="Отличная модель"></label>
                        <input type="radio" id="star4" name="UF_RATING" class="rating__input" value="4" required/><label class="rating__label" for="star4" title="Хорошая модель" data-rating="Хорошая модель"></label>
                        <input type="radio" id="star3" name="UF_RATING" class="rating__input" value="3" checked required/><label class="rating__label" for="star3" title="Обычная модель" data-rating="Обычная модель"></label>
                        <input type="radio" id="star2" name="UF_RATING" class="rating__input" value="2" required/><label class="rating__label" for="star2" title="Плохая модель" data-rating="Плохая модель"></label>
                        <input type="radio" id="star1" name="UF_RATING" class="rating__input" value="1" required/><label class="rating__label" for="star1" title="Ужасная модель" data-rating="Ужасная модель"></label>
                    </div>
                </div>
            </div>

            <div class="popup-review-form__row">
                <div class="popup-review-form__column popup-review-form__column_half">
                    <label for="name" class="popup-review-form__label">Ваше имя</label>
                    <input type="text" id="name" name="UF_AUTHOR">
                </div>

                <div class="popup-review-form__column popup-review-form__column_half">
                    <label for="city" class="popup-review-form__label">Откуда вы</label>
                    <input type="text" id="city" name="UF_PLACE">
                </div>
            </div>


            <div class="popup-review-form__row">
                <div class="popup-review-form__column">
                    <label for="review" class="popup-review-form__label">Ваш отзыв</label>
                    <textarea name="UF_TEXT" id="review" class="popup-review-form__review" placeholder="Подробно расскажите о своём опыте использования товара. Обратите внимание на качество, удобство модели, её соответствие заявленным характеристикам."></textarea>
                </div>
            </div>

            <div class="popup-review-form__row">
                <div class="popup-review-form__column">
                    <label for="" class="popup-review-form__label">Опыт использования</label>

                    <div class="experience-row">
                        <div class="experience-row__column">
                            <input type="radio" id="experience-1" class="experience-row__input" name="UF_EXPERIENCE" value="Менее месяца"/>
                            <label for="experience-1" class="experience-row__label">Менее месяца</label>
                        </div>

                        <div class="experience-row__column">
                            <input type="radio" id="experience-2" class="experience-row__input" name="UF_EXPERIENCE" value="Несколько месяцев" />
                            <label for="experience-2" class="experience-row__label">Несколько месяцев</label>
                        </div>

                        <div class="experience-row__column">
                            <input type="radio" id="experience-3" class="experience-row__input" name="UF_EXPERIENCE" value="Более года" />
                            <label for="experience-3" class="experience-row__label">Более года</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="popup-review-form__bottom">
                <div class="popup-review-form__notice">Оставляя отзыв, вы соглашаетесь с условиями <br> <a href="/confidentiality-politics" target="_blank">политики конфиденциальности</a></div>
                <input type="submit" value="Отправить отзыв" class="popup-review-form__submit">
            </div>
        </form>
    </div>

    <div class="popup-review-form__wrap-close">
        <a class="popup-review-form__close js-review-popup-close" role="button"></a>
    </div>
</div>