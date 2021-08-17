<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>Заявка на "ИЗМЕНИТЬ Email ИЛИ КОНТАКТНЫЙ НОМЕР"
        <span style="display: block; color: #000000;">ФИО: {{ "{$data['name']} {$data['surname']} {$data['middle_name']}"  }};</span>
        <span style="display: block; color: #000000;">Номер телефона: {{ $data['phone'] }};</span>
        <span style="display: block; color: #000000;">Почта: {{ $data['email'] }};</span>
    </div>
</body>
</html>