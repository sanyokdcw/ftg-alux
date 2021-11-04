<!DOCTYPE html>
<html lang="ru">
@section('title', 'Блог')
@section('desc', setting('blog-show.index_description'))
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
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{ __('blog-show.Catalog')}}</div>
  <div class="url__text"><a href="/blog">{{__('blog-show.blog')}}</a></div>
  <div class="url__text">{{ $blog->name }}</div>
</section>

<section class="detail-page">
  <div class="detail-page-title subtitle">{{ $blog->name }}</div>
  <div class="detail-page__wrapper">
    <div class="detail-page__left" style="">
      <img src="/storage/{{ $blog->image }}" alt="" style="height: 100%; object-fit:cover">
    </div>
  </div>
</section>

<section class="specifications">

  <div class="specifications__bottom">
    <div class="specifications__bottom-item">
    </div>
    <div class="text">
      {!! $blog->text !!}
    </div>
  </div>



  <div class="bottom-text">
    <p style="font-weight: bold;">{{ $blog->description }}</p>
  </div>
</section>

<div class="bottom-info">
  <div class="blog__button-time">{{ date('d-m-Y', strtotime($blog->created_at)) }}</div>
  <div class="socials">
    @foreach ($socials as $social)
      <a href="{{ $social->link }}" class="sitebar__social-link" target="_blank" style="margin-right: 5px;">
        <img src="/storage/{{ $social->image }}" alt="">
      </a>
    @endforeach
  </div>
</div>

<div class="next">
  <div class="next__text">
    {{__('blog-show.next')}}
  </div>
  <a href="/blog/{{ $next_id->slug }}">
    <img src="/images/Pajination.jpg" alt="">
  </a>
</div>

<section class="popular">
  <div class="popular__title subtitle">{{__('index.popularTitle')}}</div>
  <div class="popular__wrapper">
    @foreach ($products as $product)
      <div class="card__wrapper-item">
        <div class="card__wrapper-img" style="background-image: url(/storage/{{ $product->image }});"></div>
        <div class="card__wrapper-text">
          {{ $product->name }}
        </div>
        @if ($currency == 'KZT')
          <div class="card__wrapper-price"><span>{{ number_format($product->price_kz,0,","," ") }}</span> {{__('blog-show.tg')}}</div>
        @elseif($currency == 'USD')
          <div class="card__wrapper-price"><span>{{ number_format($product->price_uah,0,","," ") }}</span> {{__('blog-show.dol')}}</div>
        @elseif($currency == 'RUB')
          <div class="card__wrapper-price"><span>{{ number_format($product->price_ru,0,","," ") }}</span> {{__('blog-show.rub')}}</div>
        @endif
        <a href="/product/{{ $product->slug }}" class="card__wrapper-btn">{{__('index.more')}}</a>
      </div>
    @endforeach
  </div>
</section>

<style>
@media(max-width: 1000px){
  .container{
    max-width: 550px;
  } 
}
@media(max-width: 600px){
  .container{
    max-width: 400px;
  } 
}
.next {
  margin-top: 50px;
  display: flex;
  align-items: center;
}

.next__text {
  margin-right: 20px
}


.bottom-info {
  display:flex;
  justify-content: space-between;
  align-items: center
}
.bottom-text {
  background: #F7F9FA;
  margin-top: 40px;
}

.bottom-text p {
  padding: 40px 70px;
}

.text ol {
  list-style: none; counter-reset: li;
  padding-left: 17px;
}
.text li::before {
  content: counter(li) ". ";
   color: #0575E6;
  font-weight: 700;
  display: inline-block; width: 1em;
  margin-left: -1em
  }
.text li {
    counter-increment: li;
    margin-bottom: 25px;
  }
</style>
@include('layouts.footer')
</html>
