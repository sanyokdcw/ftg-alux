<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>{{__('calc.change')}}
        <span style="display: block; color: #000000;"> {{__('calc.name')}}: {{ "{$data['name']} {$data['surname']} {$data['middle_name']}"  }};</span>
        <span style="display: block; color: #000000;"> {{__('calc.number')}}: {{ $data['phone'] }};</span>
        <span style="display: block; color: #000000;"> {{__('calc.email')}}: {{ $data['email'] }};</span>
    </div>
</body>
</html>