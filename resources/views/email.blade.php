<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>Данные пользователя:
        <span style="display: block; color: #000000;">Номер телефона: {{ $data['number'] }};</span>
        <span style="display: block; color: #000000;">ФИО: {{ $data['fullname'] }};</span>
        <span style="display: block; color: #000000;">Почта: {{ $data['email'] }};</span>
    </div>
    <div style="display: block; color: #000000;">ИСТОЧНИК ВОДЫ: {{ $data['water_source'] }}; </div>
    <div style="display: block; color: #000000;">АНАЛИЗ ВХОДНОЙ ВОДЫ: (пользователь / стандартное)
        <span style="display: block; color: #000000;">1. Мутность, НОК: {{ $data['input_water']['mutnost_user'] .' / '. $data['input_water']['mutnost_standart'] }}</span>
        <span style="display: block; color: #000000;">2. Перманганатная окисляемость (мг / л): {{ $data['input_water']['permangant_user'] .' / '. $data['input_water']['permangant_standart'] }}</span>
        <span style="display: block; color: #000000;">3. Общая жесткость (мг-экв / л): {{ $data['input_water']['zhestkost_user'] .' / '. $data['input_water']['zhestkost_standart'] }}
        <span style="display: block; color: #000000;">4. Общее железо (мг / л): {{ $data['input_water']['zhelezo_user'] .' / '. $data['input_water']['zhelezo_standart'] }}</span>
        <span style="display: block; color: #000000;">5. Сероводород (мг / л): {{ $data['input_water']['serovodorod_user'] .' / '. $data['input_water']['serovodorod_standart'] }}</span>
        <span style="display: block; color: #000000;">6. Нитраты (мг / л): {{ $data['input_water']['nitrat_user'] .' / '. $data['input_water']['nitrat_standart'] }}</span>
        <span style="display: block; color: #000000;">7. Сухой остаток (мг /  л): {{ $data['input_water']['ostatok_user'] .' / '. $data['input_water']['ostatok_standart'] }}</span>
    </div>
    <div style="display: block; color: #000000;">ТРЕБОВАНИЯ К КАЧЕСТВУ ОЧИЩЕННОЙ ВОДЫ: {{ $data['water_request'] ?? 'значение не выбрано' }}</div>
    <div style="display: block; color: #000000;">АНАЛИЗ ОЧИЩЕННОЙ ВОДИ: (пользователь / стандартное)
        <span style="display: block; color: #000000;">1. Мутность, НОК: {{ $data['purified_water']['mutnost_user'] .' / '. $data['purified_water']['mutnost_standart'] }}</span>
        <span style="display: block; color: #000000;">2. Перманганатная окисляемость (мг / л): {{ $data['purified_water']['permangant_user'] .' / '. $data['purified_water']['permangant_standart'] }}</span>
        <span style="display: block; color: #000000;">3. Общая жесткость (мг-экв / л): {{ $data['purified_water']['zhestkost_user'] .' / '. $data['purified_water']['zhestkost_standart'] }}</span>
        <span style="display: block; color: #000000;">4. Общее железо (мг / л): {{ $data['purified_water']['zhelezo_user'] .' / '. $data['purified_water']['zhelezo_standart'] }}</span>
        <span style="display: block; color: #000000;">5. Сероводород (мг / л): {{ $data['purified_water']['serovodorod_user'] .' / '. $data['purified_water']['serovodorod_standart'] }}</span>
        <span style="display: block; color: #000000;">6. Нитраты (мг / л): {{ $data['purified_water']['nitrat_user'] .' / '. $data['purified_water']['nitrat_standart'] }}</span>
        <span style="display: block; color: #000000;">7. Сухой остаток (мг / л): {{ $data['purified_water']['ostatok_user'] .' / '. $data['purified_water']['ostatok_standart'] }}</span>
    </div>
    <div style="display: block; color: #000000;">ПРОДУКТИВНОСТЬ: {{ $data['performance']['day'] .' / '. $data['performance']['day'] }}</div>
</body>
</html>