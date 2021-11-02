<!DOCTYPE html>
<html lang="ru">
    @section('title', 'Калькулятор')
    @include('layouts.catalog')
    @include('layouts.header')
    @section('content')
    
    <section class="url">
        <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
        <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{__('blog-show.Catalog')}}</div>
        <div class="url__text">{{__('calc.calc')}}</div>
    </section>
    <section class="blog">
    <form action="/request" method="POST">
    @csrf
    <div class="blog__title subtitle">{{__('calc.volume')}}</div>
    <div class="contact__wrapper-title" style="margin-bottom: 50px">{{__('calc.indicators')}}:</div>
    <section class="calc">
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.dosage')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="inhibitor_dosage" id="" placeholder="0 мг/л ( г/м3 )" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.consumption')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="water_consumption" id="" placeholder="0 мг/ч" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.quantity')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="inhibitors_amount_1" id="" placeholder="г/ч" required>
                <input type="number" name="inhibitors_amount_2" id="" placeholder="кг/сутки" class="calc__margin" required>
                <input type="number" name="inhibitors_amount_3" id="" placeholder="кг/месяц" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.reagent')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="tank_volume_1" id="" placeholder="0 литров" required>
                <input type="number" name="tank_volume_2" id="" placeholder="0% раствор" class="calc__margin" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.prepare')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="liquor_calculation_1" id="" placeholder="кг продажного" required>
                <div class="calc__symbol">
                    +
                </div>
                <input type="number" name="liquor_calculation_2" id="" placeholder="кг/сутки" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.dose')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="dosing_pump_1" id="" placeholder="мл/ч разбавлены" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">

                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="dosing_pump_2" id="" placeholder="импульсов в мин" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.accross')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="dosing_pump_3" id="" placeholder="0 мг/л ( г/м3 )" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    {{__('calc.resource')}}
                </div>
            </div>
            <div class="calc__right">
                <input type="number" name="tank_resource_1" id="" placeholder="Часов" required>
                <div class="calc__symbol">
                    =
                </div>
                <input type="number" name="tank_resource_2" id="" placeholder="Суток работы" required>
            </div>
        </div>
    </section>
    <div class="calc__btn">
        <div class="form__input" style="width: 50%;">
     <input type="submit" value="Отправить" style="">
</form>
        </div>
    </div>

</section>

<style>
.calc__btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
</style>

@include('layouts.footer')
</html>
