<!DOCTYPE html>
<html lang="ru">
@section('title', 'Доставка и Оплата')
@include('layouts.catalog')
@include('layouts.header')
@section('content')

        
<section class="url">
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">Каталог</div>
  <div class="url__text">{{__('index.del')}} {{__('index.and')}} {{__('index.payment')}}</div>
</section>

<section class="delivery">
  <div class="delivery__title subtitle">{{__('index.del')}} {{__('index.and')}} {{__('index.payment')}}</div>
  <div class="delivery__subtitle title">{{__('index.del')}}</div>
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
  <div class="delivery__subtitle title">{{__('index.paymentMethods')}}</div>
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
