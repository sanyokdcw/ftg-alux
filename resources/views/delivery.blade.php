<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@section('content')

        
<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Доставка и оплата</div>
</section>

<section class="delivery">
  <div class="delivery__title subtitle">ДОСТАВКА И ОПЛАТА</div>
  <div class="delivery__subtitle title">ДОСТАВКА</div>
  <div class="delivery__wrapper">
    @foreach ($deliveries as $delivery)
    <div class="delivery__wrapper-item">
      <div class="delivery__wrapper-item_bg">
        <img src="/storage/{{ $delivery->image }}" alt="">
      </div>
      <div class="delivery__wrapper-title">
        {{ $delivery->title }}
      </div>
      <div class="delivery__wrapper-text">
        {!! $delivery->text !!} 
      </div>
    </div>
    @endforeach
  </div>
</section>

<section class="methods">
  <div class="delivery__subtitle title">СПОСОБЫ ОПЛАТЫ</div>
  <div class="methods__wrapper">
    @foreach ($payments as $payment)
    <div class="methods__wrapper-item" style="padding:50px">
      <div class="methods__wrapper-title">
        <img src="/storage/{{ $payment->image }}" alt="">
        <span>{{ $payment->title }}</span>
      </div>
      <div class="methods__wrapper-text">
        {!! $payment->text !!}
      </div>
    </div>
    @endforeach
  </div>
</section>


@include('layouts.footer')
</html>
