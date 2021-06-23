<!DOCTYPE html>
<html lang="ru">

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
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Поиск</div>
</section>

<section class="project">
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="q" class="search" placeholder="Введите ваш запрос...">
    <button type="submit">
      <img src="../images/search-icon.png" alt="">
    </button>
  </form>
  @if($products->count() == 0)
    <div class="project__title subtitle" style="font-size: 25px">По запросу {{ $q }} ничего не найдено</div>
  @elseif($q != null)
  <div class="project__title subtitle" style="font-size: 25px">Проекты по запросу: {{ $q }}</div>

  @else 
  <div class="project__title subtitle">НАШИ ПРОДУКТЫ</div>

  @endif
  <div class="card__wrapper-bottom">
    @foreach ($products as $product)
    <div class="card__wrapper-item" style=“margin-top:20px”>
      <a href="/product/{{ $product->id }}" class="card__wrapper-img" style="background-image: url(/storage/{{ $product->image }});"></a>
      <div class="card__wrapper-text">
        {{ $product->name }}
      </div>
      <div class="card__wrapper-price"><span>
        @if ($currency == 'KZT')
          {{ number_format($product->price_kz,0,","," ") }}</span> тг
        @elseif($currency == 'UAH')
          {{ number_format($product->price_uah,0,","," ") }}</span> грн
        @elseif($currency == 'RUB')
          {{ number_format($product->price_ru,0,","," ") }}</span> руб
        @endif
      </div>
      <a href="/product/{{ $product->id }}" class="card__wrapper-btn">Подробнее</a>
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
      margin-top: 40px;
      padding: 20px;
      outline: none;
  }
  </style>
@include('layouts.footer')
</html>