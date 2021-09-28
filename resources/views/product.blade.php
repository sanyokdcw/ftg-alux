<!DOCTYPE html>
<html lang="ru">
@section('title', 'Подобрать продукцию')
@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
    <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
    <div style="cursor: pointer;" class="url__text" onclick="opensb()">Каталог</div>
    <div class="url__text">{{__('index.selectProduct')}}</div>
</section>

<section class="product" style="min-height: 1180px">
    @if (Session::has('message'))
    <div class="form-data_error">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <p class="form-data_error-body">{{ Session::get('message') }}</p>
    </div>
    @endif
    <div class="product__title subtitle" style="text-transform: uppercase">{{__('index.system')}}</div>
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
                    <div class="product__wrapper-left_text">Анализ очищенной воды</div>
                </div>
                <div class="product__wrapper-left_item" id="Tab4link" onclick="changeTab('Tab4')">
                    <div class="product__wrapper-left_number">5.</div>
                    <div class="product__wrapper-left_text">Продуктивность</div>
                </div>
            </div>
        </div>
        <div class="product__wrapper-right">
    <form action="/request" id="formSystem" method="POST">
        @csrf
        <span class="tab-content" id="Tab0">
            <div class="product__wrapper-right_title title">Выберите источник воды</div>
            <div class="product__wrapper-right_checkbox">
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="water_source" id="radio-1" value="Городской водопровод" checked>
                    <label for="radio-1">Городской водопровод</label>
                </div>
                <div class="product__wrapper-right_radio" >
                    <input type="radio" name="water_source" id="radio-2" value="Колодец">
                    <label for="radio-2">Колодец</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio"id="radio-3"  name="water_source"  value="Скважина">
                    <label for="radio-3">Скважина</label>
                </div>
                <div class="product__wrapper-right_radio">
                    <input type="radio" name="water_source" id="radio-4" value="Речка, открытый водоем">
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
                        <input type="number" name="input_water[mutnost_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[mutnost_standart]" value="1">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Перманганатная окисляемость (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[permangant_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[permangant_standart]" value="2">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общая жесткость (мг-экв / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[zhestkost_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[zhestkost_standart]" value="7">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Общее железо (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[zhelezo_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[zhelezo_standart]" value="0.3">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сероводород (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[serovodorod_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[serovodorod_standart]" value="0.1">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Нитраты (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[nitrat_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[nitrat_standart]" value="50">
                    </div>
                </div>
                <div class="product__wrapper-right_row">
                    <div class="product__wrapper-right_column">
                        Сухой остаток (мг / л)
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[ostatok_user]" value="0">
                    </div>
                    <div class="product__wrapper-right_column">
                        <input type="number" name="input_water[ostatok_standart]" value="1000">
                    </div>
                </div>
            </div>
            <a class="product__wrapper-right_btn" onclick="changeTab('Tab2')">Продолжить</a>
        </span>
        <span class="tab-content" id="Tab2">

            <div class="product__wrapper-right_requirement" style="margin-top: 0">
                <div class="product__wrapper-right_title title">ВАШИ ТРЕБОВАНИЯ К КАЧЕСТВУ очищенной
                    воды:</div>
                <div class="product__wrapper-right_block">


                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-11" name="purified_water" value="Техническая вода (душ, туалет)">
                        <label for="radio-11">Техническая вода (душ, туалет)</label>
                    </div>


                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-22" name="water_request" value="Дистиллированная вода">
                        <label for="radio-22">Дистиллированная вода</label>
                    </div>
                    <div class="product__wrapper-right_radio" >
                        <input type="radio" id="radio-33" name="water_request" value="Вода для парового котла">
                        <label for="radio-33">Вода для парового котла</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-44" name="water_request" value="Питьевая вода (ГСанПиН 2.2.4-171-10)" >
                        <label for="radio-44">Питьевая вода (ГСанПиН 2.2.4-171-10)</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-55" name="water_request"  value="Вода для водогрейной котельной">
                        <label for="radio-55">Вода для водогрейной котельной</label>
                    </div>
                    <div class="product__wrapper-right_radio">
                        <input type="radio" id="radio-6" name="water_request"  value="Водопроводная вода (ДСанПиН 2.2.4-171-10)">
                        <label for="radio-6">Водопроводная вода (ДСанПиН 2.2.4-171-10)</label>
                    </div>
                </div>
                <a  class="product__wrapper-right_btn" onclick="changeTab('Tab3')">Продолжить</a>
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
                            <input type="number" name="purified_water[mutnost_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[mutnost_standart]" value="2">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Перманганатная окисляемость (мг / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[permangant_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[permangant_standart]" value="5">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Общая жесткость (мг-экв / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[zhestkost_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[zhestkost_standart]" value="7">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Общее железо (мг / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[zhelezo_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[zhelezo_standart]" value="0.3">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Сероводород (мг / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[serovodorod_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[serovodorod_standart]" value="0.5">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Нитраты (мг / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[nitrat_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[nitrat_standart]" value="100">
                        </div>
                    </div>
                    <div class="product__wrapper-right_row">
                        <div class="product__wrapper-right_column">
                            Сухой остаток (мг / л)
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[ostatok_user]" value="0">
                        </div>
                        <div class="product__wrapper-right_column">
                            <input type="number" name="purified_water[ostatok_standart]" value="1500">
                        </div>
                    </div>
                </div>
            <a class="product__wrapper-right_btn" onclick="changeTab('Tab4')">Продолжить</a>
            </div>
        </span>
        <span class="tab-content" id="Tab4">

            <div class="product__wrapper-right_performance" style="margin-top: 0; margin-right: 70px;">
                <div class="product__wrapper-right_title title">УКАЖИТЕ ПРОИЗВОДИТЕЛЬНОСТЬ:</div>
                <div class="product__wrapper-right_block" style="display: flex; flex-wrap: nowrap; justify-content: space-between; width: 85%">
                    <div class="product__wrapper-right_column last-stage">
                        <div class="product__wrapper-right_text">Суточная м3 / сутки</div>
                        <input type="number" name="performance[day]"  value="0">
                    </div>
                    <div class="product__wrapper-right_column last-stage">
                        <div class="product__wrapper-right_text">Часовая М3 / час</div>
                        <input type="number" name="performance[month]"  value="0">
                    </div>
                </div>
                <input type="hidden" name="fullname" value="" id="name">
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