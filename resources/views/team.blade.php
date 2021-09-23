<!DOCTYPE html>
<html lang="ru">
@section('title', 'Команда')
@include('layouts.catalog')
@include('layouts.header')
@section('content')

<section class="url">
  <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">каталог</div>
  <div class="url__text">{{ __('index.team')}}</div>
</section>

<section class="team">
  <div class="team__title subtitle">{{ __('index.team')}}</div>
  @foreach ($positions as $position)
      
  
  <div class="team__subtitle title">{{ $position->name }}</div>
  <div class="team__wrapper">
    @foreach ($position->employees as $employee)
    <div class="team__wrapper-card">
      <div class="team__wrapper-top">
        <img src="/storage/{{ $employee->image }}" alt="">
      </div>
      <div class="team__wrapper-bottom">
        <div class="team__wrapper-title">{{ $employee->degree }}</div>
        <div class="team__wrapper-subtitle">{{ $employee->name }}</div>
        <a href="tel:88008001234" class="team__wrapper-link"><img src="../images/phone-1.png" alt=""> {{ $employee->telephone }}</a>
        <a href="mailto:infoftg@company.com" class="team__wrapper-link"><img src="../images/mail.png" alt="">{{ $employee->email }}</a>
      </div>
    </div>
    @endforeach
  </div>
  @endforeach
</section>

@include('layouts.footer')
</html>
