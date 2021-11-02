<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div>{{__('calc.callback')}}
        <span style="display: block; color: #000000;">{{__('calc.name')}}: {{ $data['fullname'] }};</span>
        <span style="display: block; color: #000000;">{{__('calc.phone')}}: {{ $data['phone'] }};</span>
        <span style="display: block; color: #000000;">{{__('calc.email')}}: {{ $data['email'] }};</span>
        <span style="display: block; color: #000000;">{{__('calc.question')}}: {{ $data['question'] }};</span>
    </div>
</body>
</html>