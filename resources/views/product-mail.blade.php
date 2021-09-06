<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>
        <span style="display: block; color: #000000;">ФИО: {{ "{$data['name']} {$data['surname']}"  }};</span>
        <span style="display: block; color: #000000;">Номер телефона: {{ $data['telephone'] }};</span>
        <span style="display: block; color: #000000;">Почта: {{ $data['mail'] }};</span>
        <span style="display: block; color: #000000;">Сумма заказа: {{ $data['sum'] }};</span>
        <span style="display: block; color: #000000;">Статус: {{ $data['status'] }};</span>
        <span style="display: block; color: #000000;">Дата заказа: {{ \Carbon\Carbon::create($data['created_at'])->format('d-m-Y') }};</span>\
        <span style="display: block; color: #000000;">
            {!! $data['productsLinks'] !!}
        </span>

    </div>
</body>
</html>