<!DOCTYPE html>
<html lang="ru">
@section('title', 'Поиск')
@include('layouts.catalog')
@include('layouts.header')
@section('content')
@php
  if (session('currency') == null){
    session(['currency' => 'KZT']);
  }
  $currency = session('currency');
@endphp

<section class="url">
  <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{ __('blog-show.Catalog') }}</div>
  <div class="url__text">{{__('index.search')}}</div>
</section>

<section class="project">
  <form action="/search" method="POST" >
    @csrf
      <div style="position: relative; max-width: 410px">
          <input style="width: 100%" type="text" name="q" class="search" placeholder="Введите ваш запрос...">
          <button class="search-main-btn" type="submit" style="position: absolute; top: 36%; right: 15px">
              <img src="../images/search-icon.png" alt="" style="width: 25px; height: 25px">
          </button>
      </div>

  </form>
  @if($products->count() == 0)
    <div class="project__title subtitle" style="font-size: 25px">{{ __('calc.q') }} {{ $q }} {{ __('calc.wha') }}</div>
  @elseif($q != null)
  <div class="project__title subtitle" style="font-size: 25px">{{ __('calc.search') }}: {{ $q }}</div>

  @else
  <div class="project__title subtitle">{{__('index.ourProducts')}}</div>

  @endif
  <div class="card__wrapper-bottom">
    @foreach ($products as $product)
    <div class="card__wrapper-item" style=“margin-top:20px”>
      <a href="/product/{{ $product->slug }}" class="card__wrapper-img" style="background-image: url(/storage/{{ $product->image }});"></a>
      <div class="card__wrapper-text">
        {{ $product->name }}
      </div>
      <div class="card__wrapper-price"><span>
        @if ($currency == 'KZT')
          {{ number_format($product->price_kz,0,","," ") }}</span> {{ __('card.tg') }}
        @elseif($currency == 'USD')
          {{ number_format($product->price_uah,0,","," ") }}</span> {{ __('card.dol') }}
        @elseif($currency == 'RUB')
          {{ number_format($product->price_ru,0,","," ") }}</span> {{ __('card.rub') }}
        @endif
      </div>
      <a href="/product/{{ $product->slug }}" class="card__wrapper-btn">{{__('index.more')}}</a>
    </div>
    @endforeach
  </div>

</section>

<script>
  function changeTab(evt,type) {

      @foreach($products as $p)
      btns = document.getElementsByClassName("{{ $loop->index }}");
      for (i = 0; i < btns.length; i++) {
        btns[i].style = "border: 1px solid #f7f9fa;"
      }

      if(type == 'task{{ $loop->index }}') {
        document.getElementById('task{{ $loop->index }}').style.display = "block";
        document.getElementById('result{{ $loop->index }}').style.display = "none";
        document.getElementById('solution{{ $loop->index }}').style.display = "none";

        evt.currentTarget.style = "border: 1px solid #112468;";
      }
      if(type == 'solution{{ $loop->index }}') {
        document.getElementById('solution{{ $loop->index }}').style.display = "block";
        document.getElementById('task{{ $loop->index }}').style.display = "none";
        document.getElementById('result{{ $loop->index }}').style.display = "none";
        evt.currentTarget.style = "border: 1px solid #112468;";

      }
      if(type == 'result{{ $loop->index }}') {
        document.getElementById('result{{ $loop->index }}').style.display = "block";
        document.getElementById('task{{ $loop->index }}').style.display = "none";
        document.getElementById('solution{{ $loop->index }}').style.display = "none";
        evt.currentTarget.style = "border: 1px solid #112468;";
      }
      @endforeach
  }
</script>
<style lang="css">
  .search {
      width: 50%;
      height: 55px;
      background: #ffffff;
      border: 1px solid #112468;
      border-radius: 100px;
      margin-top: 20px;
      margin-bottom: 20px;
      padding: 20px;
      outline: none;
  }
  </style>
@include('layouts.footer')
</html>
