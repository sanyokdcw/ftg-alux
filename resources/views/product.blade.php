<!DOCTYPE html>
<html lang="ru">
@section('title', 'Подобрать продукцию')
@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
    <div class="url__text">Главная</div>
    <div class="url__text">Подобрать продукцию</div>
</section>

<section class="product" style="min-height: 1180px">
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
    <form action="/send-product-email" id="formSystem" method="POST">
        @csrf
        <span class="tab-content" id="Tab0">
            <div class="product__wrapper-right_title title">Выберите источник воды</div>
            <div class="product__wrapper-right_checkbox">
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-1" value="1" checked>
                    <label for="radio-1">Городской водопровод</label>
                </div>
                <div class="product__wrapper-right_radio" >
                    <input type="radio" name="radio-1" id="radio-2" value="2">
                    <label for="radio-2">Колодец</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio"id="radio-3"  name="radio-1"  value="3">
                    <label for="radio-3">Скважина</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="radio-1" id="radio-4" value="4">
                    <label for="radio-4">Речка, открытый водоем</label>
                </div>
                <a class="product__wrapper-right_btn" onclick="changeTab('Tab1')">Продолжить</a>
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
                        <input type="number" name="mutnost1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="mutnost2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="permangant1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="permangant2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="serovodorod1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="serovodorod2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrat1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrat2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ostatok1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ostatok2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="mutnost11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="mutnost12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="okys1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="okys2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="sero1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="sero2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrats1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrats2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ostatok11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ostatok12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="mutnost111" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="mutnost112" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="okys11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="okys12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost111" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhestkost112" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo111" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelezo112" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="sero11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="sero12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrats11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitrats12" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ostatok111" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"name="ostatok112" value="0">
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
                        <input type="radio" id="radio-11" name="radio-2" value="1">
                        <label for="radio-11">Техническая вода (душ, туалет)</label>
                    </div>


                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-22" name="radio-2" value="2">
                        <label for="radio-22">Дистиллированная вода</label>
                    </div>
                    <div class="product__wrapper-right_radio" >
                        <input type="radio" id="radio-33" name="radio-2" value="3">
                        <label for="radio-33">Вода для парового котла</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-44" name="radio-2" value="4" >
                        <label for="radio-44">Питьевая вода (ГСанПиН 2.2.4-171-10)</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-55" name="radio-2"  value="5">
                        <label for="radio-55">Вода для водогрейной котельной</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-6" name="radio-2"  value="6">
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
                        <input type="number" name="perg1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="perg2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zh1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zh2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelez1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="zhelez1" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ser1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ser1" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nit1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nit2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ost1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ost2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="nok1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="nok2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ok1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="ok2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obzh1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obzh2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obzhel1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obzhel2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="servod1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="servod2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitr1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitr2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="suhost1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="suhost2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Мутность, НОК
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="mut1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="mut2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="perox1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="perox2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="obshzhel1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number"  name="obshzhel2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obshzhelez1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="obshzhelez2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="servodor1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="servodor2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitratt1" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="nitratt2" value="0">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="suhost11" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="suhost12"  value="0">
                    </div>
                </div>
            </div>
            <button class="product__wrapper-right_btn" onclick="changeTab('Tab4')">Продолжить</button>
            </div>
        </span>
        <span class="tab-content" id="Tab4">

            <div class="product__wrapper-right_performance" style="margin-top: 0; margin-right: 70px;">
                <div class="product__wrapper-right_title title">УКАЖИТЕ ПРОИЗВОДИТЕЛЬНОСТЬ:</div>
                <div class="product__wrapper-right_block" style="display: flex; flex-wrap: nowrap; justify-content: space-between; width: 85%">
                    <div class="product__wrapper-right_column last-stage">
                        <div class="product__wrapper-right_text">Суточная м3 / сутки</div>
                        <input type="number" name="sutoch1"  value="0">
                    </div>
                    <div class="product__wrapper-right_column last-stage">
                        <div class="product__wrapper-right_text">Часовая М3 / час</div>
                        <input type="number" name="sutoch2"  value="0">
                    </div>
                </div>
                <input type="hidden" name="name" value="" id="name">
                <input type="hidden" name="email" value="" id="email">
                <input type="hidden" name="number" value="" id="number">

                <a href="#" type="submit" class="product__wrapper-right_btn" onclick="openModelRight('product')">ПОЛУЧИТЬ ПРЕДЛОЖЕНИЕ</a>
                
            </div>
        </span>
    </form>
    </div>
</section>

<script src="/js/product.js">
</script>
<script>
    function sendForm(evt) {
        evt.preventDefault();
        document.getElementById('name').value = document.getElementById('formName').value
        document.getElementById('email').value = document.getElementById('formEmail').value
        document.getElementById('number').value = document.getElementById('number_mask_h').value
        document.getElementById('formSystem').submit()
    }
</script>
@include('layouts.footer')
</html>