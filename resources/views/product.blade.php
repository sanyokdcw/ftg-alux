<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
    <div class="url__text">Главная</div>
    <div class="url__text">Подобрать продукцию</div>
</section>

<section class="product">
    <div class="product__title subtitle">ПОДОБРАТЬ ПРОДУКЦИЮ</div>
    <div class="product__wrapper">
        <div class="product__wrapper-left">
            <div class="product__wrapper-left">
                <div class="product__wrapper-left_item product__wrapper-left_item_active" id="Tab0link" onclick="changeTab('Tab0')">
                    <div class="product__wrapper-left_number" >1.</div>
                    <div class="product__wrapper-left_text">Источник воды</div>
                </div>
                <div class="product__wrapper-left_item" id="Tab1link" onclick="changeTab('Tab1')">
                    <div class="product__wrapper-left_number" >2.</div>
                    <div class="product__wrapper-left_text">Анализ входной воды</div>
                </div>
                <div class="product__wrapper-left_item" id="Tab2link" onclick="changeTab('Tab2')">
                    <div class="product__wrapper-left_number">3.</div>
                    <div class="product__wrapper-left_text">Требования к качеству очищенной воды</div>
                </div>
                <div class="product__wrapper-left_item" id="Tab3link" onclick="changeTab('Tab3')">
                    <div class="product__wrapper-left_number">4.</div>
                    <div class="product__wrapper-left_text">Анализ очищенной води</div>
                </div>
                <div class="product__wrapper-left_item" id="Tab4link" onclick="changeTab('Tab4')">
                    <div class="product__wrapper-left_number">5.</div>
                    <div class="product__wrapper-left_text">Продуктивность</div>
                </div>
            </div>
        </div>
        <div class="product__wrapper-right">
        <span class="tab-content" id="Tab0">
            <div class="product__wrapper-right_title title">Выберите источник воды</div>
            <div class="product__wrapper-right_checkbox">
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-1">
                    <label for="radio-1">Городской водопровод</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-2">
                    <label for="radio-2">Колодец</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-3">
                    <label for="radio-3">Скважина</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-4">
                    <label for="radio-4">Речка, открытый водоем</label>
                </div>
                <button class="product__wrapper-right_btn" onclick="changeTab('Tab1')">Продолжить</button>
            </div>
        </span>
        
        <span class="tab-content" id="Tab1">
        <div class="product__wrapper-right_result">

                <div class="product__wrapper-right_title title">
                    Внесите РЕЗУЛЬТАТЫ АНАЛИЗА ВОДЫ, если они отличаются от стандартных значений:
                </div>
            </div>
            <div class="product__wrapper-right_table">
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Показатель
                    </div>
                    <div class="product__wrapper-right_column">
                        Ваше значение
                    </div>
                    <div class="product__wrapper-right_column">
                        Стандартное значение
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
            </div>
            <button class="product__wrapper-right_btn" onclick="changeTab('Tab2')">Продолжить</button>
        </span>
        <span class="tab-content" id="Tab2">

            <div class="product__wrapper-right_requirement" style="margin-top: 0">
                <div class="product__wrapper-right_title title">ВАШИ ТРЕБОВАНИЯ К КАЧЕСТВУ очищенной
                    воды:</div>
                <div class="product__wrapper-right_block">


                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-11" name="radio">
                        <label for="radio-11">Техническая вода (душ, туалет)</label>
                    </div>


                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-22" name="radio">
                        <label for="radio-22">Дистиллированная вода</label>
                    </div>
                    <div class="product__wrapper-right_radio" >
                        <input type="radio" id="radio-33" name="radio">
                        <label for="radio-33">Вода для парового котла</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-44" name="radio" >
                        <label for="radio-44">Питьевая вода (ГСанПиН 2.2.4-171-10)</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-55" name="radio">
                        <label for="radio-55">Вода для водогрейной котельной</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-6" name="radio">
                        <label for="radio-6">Водопроводная вода (ДСанПиН 2.2.4-171-10)</label>
                    </div>
                </div>
                <button class="product__wrapper-right_btn" onclick="changeTab('Tab3')">Продолжить</button>
            </div>
        </span>
        <span class="tab-content" id="Tab3">
            <div class="product__wrapper-right_performance">
            <div class="product__wrapper-right_table" style="margin-top: 0">
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Показатель
                    </div>
                    <div class="product__wrapper-right_column">
                        Ваше значение
                    </div>
                    <div class="product__wrapper-right_column">
                        Стандартное значение
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" value="0">
                    </div>
                </div>
            </div>
            <button class="product__wrapper-right_btn" onclick="changeTab('Tab4')">Продолжить</button>
            </div>
        </span>
        <span class="tab-content" id="Tab4">

            <div class="product__wrapper-right_performance" style="margin-top: 0; margin-right: 70px;">
                <div class="product__wrapper-right_title title">УКАЖИТЕ ПРОИЗВОДИТЕЛЬНОСТЬ:</div>
                <div class="product__wrapper-right_block" style="    display: -webkit-box; flex-wrap: nowrap">
                    <div class="product__wrapper-right_column">
                        <div class="product__wrapper-right_text">Суточная м3 / сутки</div>
                        <input type="number" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <div class="product__wrapper-right_text">Часовая М3 / час</div>
                        <input type="number" value="0">
                    </div>
                </div>
                <a href="#" class="product__wrapper-right_btn" onclick="openModelRight('product')">ПОЛУЧИТЬ ПРЕДЛОЖЕНИЕ</a>
            </div>
    </span>
        
    </div>
</section>

<script src="/js/product.js">

</script>
@include('layouts.footer')
</html>