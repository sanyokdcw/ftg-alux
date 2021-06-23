<!DOCTYPE html>
<html lang="ru">

    @include('layouts.catalog')
    @include('layouts.header')
    @section('content')
    
    <section class="url">
        <div class="url__text"><a href="/">Главная</a></div>
        <div class="url__text">Калькулятор</div>
    </section>
    <section class="blog">
    <form action="/request" method="POST">
    @csrf
    <div class="blog__title subtitle">КАЛЬКУЛЯТОР ОБЪЕМА</div>
    <div class="contact__wrapper-title" style="margin-bottom: 50px">ПОКАЗАТЕЛИ:</div>
    <section class="calc">
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Дозировка товарного ингибитора (ваше значения):
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="inhibitor_dosage" id="" placeholder="0 мг/л ( г/м3 )" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Расход воды в которую дозируется ингибитор (ваше значения), Q =
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="water_consumption" id="" placeholder="0 мг/ч" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Кількість товарного інгібатора, необхідне для потоку з витратою, Q:
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="inhibitors_amount_1" id="" placeholder="г/ч" required>
                <input type="text" name="inhibitors_amount_2" id="" placeholder="кг/сутки" class="calc__margin" required>
                <input type="text" name="inhibitors_amount_3" id="" placeholder="кг/месяц" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Объем реагентного бака с которого будет осуществляться дозирования (ваше значения):
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="tank_volume_1" id="" placeholder="0 литров" required>
                <input type="text" name="tank_volume_2" id="" placeholder="0% раствор" class="calc__margin" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    У баку готуємо розчин з розрахунку:
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="liquor_calculation_1" id="" placeholder="кг продажного" required>
                <div class="calc__symbol">
                    +
                </div>
                <input type="text" name="liquor_calculation_2" id="" placeholder="кг/сутки" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Насос-дозатор OLB02-07 должен дозировать:
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="dosing_pump_1" id="" placeholder="мл/ч разбавлены" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">

                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="dosing_pump_2" id="" placeholder="импульсов в мин" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Через
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="dosing_pump_3" id="" placeholder="0 мг/л ( г/м3 )" required>
            </div>
        </div>
        <div class="calc__row">
            <div class="calc__left">
                <div class="calc__text">
                    Ресурс растворимого бака составляет:
                </div>
            </div>
            <div class="calc__right">
                <input type="text" name="tank_resource_1" id="" placeholder="Часов" required>
                <div class="calc__symbol">
                    =
                </div>
                <input type="text" name="tank_resource_2" id="" placeholder="Суток работы" required>
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
