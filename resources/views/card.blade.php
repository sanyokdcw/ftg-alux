<!DOCTYPE html>
<html lang="ru">
@section('title', 'Товары')
@section('desc', $subcategory->name)
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
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{__('blog-show.Catalog')}}</div>
  <div class="url__text">{!! strip_tags(App\Models\Category::find($subcategory->category_id)->name) !!}</div>
  <div class="url__text">{{ $subcategory->name }}</div>
</section>

<section class="card" style="min-height: 1230px;">
  <div class="card__title subtitle">{{ $subcategory->name }}</div>
  <div class="card__wrapper">
    <div class="card__wrapper-top">
      <div class="card__wrapper-number">
        {{__('card.products')}} - <span>{{ $products->count() }}</span>
      </div>
      <div class="card__wrapper-filter dropdown">
          <span>
            @if($sort == 'down')
            {{__('card.decrease')}}
            @else
            {{__('card.increase')}}
            @endif
          </span>
          <div class="dropdown-content">
            @if($sort == 'down')
            <p style="font-size: 14px;">
              <a href="/subcategory/{{ $subcategory->slug }}?sort=up">
                {{__('card.increase')}}
            </a>
            @else
            <p style="font-size: 14px;">
              <a href="/subcategory/{{ $subcategory->slug }}?sort=down">
                {{__('card.decrease')}}
            </a>
            @endif
            </p>
          </div>
      </div>
    </div>
    <div class="card__wrapper-bottom">
      @foreach ($products as $product)
      <div class="card__wrapper-item">
        <a href="/product/{{ $product->slug }}" class="card__wrapper-img" style="background-image: url(/storage/{{ $product->image }});"></a>
        <div class="card__wrapper-text">
          {{ $product->name }}
        </div>
        <div class="card__wrapper-price"><span>
          @if ($currency == 'KZT')
            {{ number_format($product->price_kz,0,","," ") }}</span> {{__('card.tg')}}
          @elseif($currency == 'USD')
            {{ number_format($product->price_uah,0,","," ") }}</span> {{__('card.dol')}}

          @elseif($currency == 'RUB')
            {{ number_format($product->price_ru,0,","," ") }}</span> {{__('card.rub')}}

          @endif
        </div>
        <a href="/product/{{ $product->slug }}" class="card__wrapper-btn">{{__('index.more')}}</a>
      </div>
      @endforeach
    </div>
  </div>
</section>
<style>

</style>
@include('layouts.footer')
</html>
