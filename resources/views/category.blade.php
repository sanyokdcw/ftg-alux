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
  <div class="url__text">{!! strip_tags($category->name) !!}</div>
  
</section>

<section class="card">
  <div class="card__title subtitle">{{ strip_tags($category->name) }}</div>
  <div class="card__wrapper">
    <div class="card__wrapper-top">
      <div class="card__wrapper-number">
        <span>{{ 0 }}</span> товаров
      </div>
      <div class="card__wrapper-filter dropdown">
          <span>
            @if(1)
            По уменьшению цены
            @else
            По увеличению цены
            @endif
          </span>
          <div class="dropdown-content">
            @if(1)
            <p style="font-size: 14px;">
              <a href="/subcategoryp">
                По увеличению цены
            </a>
          
            @else 
            <p style="font-size: 14px;">
              <a href="/subcategory?sort=down">
                По уменьшению цены
            </a>
            
            

            @endif
            </p>
          </div>
      </div>
    </div>
    <div class="card__wrapper-bottom">
      @foreach ([] as $product)
      <div class="card__wrapper-item">
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
  </div>
</section>
<style>

</style>
@include('layouts.footer')
</html>
