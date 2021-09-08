<!DOCTYPE html>
<html lang="ru">
@section('title', 'Главная')
@section('desc', setting('index.index_description'))
@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="system">
  <div class="system__bg" style="background-image: url({{ is_null($banner)? 'images/main-bg.jpg': asset("storage/$banner") }});"></div>
  <div class="system__wrapper swiper-container">
    <div class="swiper-wrapper">
      @foreach ($categories_menu as $category)
	@php
if(App\Models\Subcategory::where('category_id', $category->id)->where('available', 1) ->first())
	$sub_link = '/subcategory/' .  App\Models\Subcategory::where('category_id', $category->id)->first()->id;
else 
  $sub_link = '/category/'.$category->id;
@endphp

<a href="{{ $sub_link }}" style="display:flex; flex-direction: column">
      <div class="system__wrapper-item swiper-slide">
        <div class="system__wrapper-item_img">
          <img src="/storage/{{ $category->image }}" class="system_img"  alt="">
        </div>
        <div class="system__wrapper-item_text">
          {!! $category->name !!}
	</a>
</div>
      </div>
      @endforeach
    </div>
      <div class="swiper-pagination" ></div>

  </div>
</section>

<section class="property">
  <div class="property__wrapper">
    @foreach ($advantages as $advantage)
    <div class="property__wrapper-item">
      <div class="property__wrapper-item_top">
        <img src="/storage/{{ $advantage->image }}" alt="">
      </div>
      <div class="property__wrapper-item_title title">{{ $advantage->title }}</div>
      <div class="property__wrapper-item_text">{{ $advantage->text }}</div>
    </div>
    @endforeach
  </div>
</section>

<section class="client">
  <div class="client__top">
    <div class="client__title title">{{ __('index.ourClients') }}</div>
    {{-- <a href="#" class="client__full">Все клиенты</a> --}}
  </div>
  <div class="client__wrapper">
    @foreach ($customers as $customer)
    <div class="client__wrapper-item">
      <img src="/storage/{{ $customer->image }}" alt="">
    </div>
    @endforeach
  </div>
</section>

<section class="news">
  <div class="client__top">
    <div class="client__title title">{{ __('index.lastNews') }}</div>
    <a href="/blog" class="client__full">{{ __('index.allNews')}}</a>
  </div>
  <div class="news__wrapper">
    @foreach ($blogs as $blog)
    <div class="news__wrapper-item">
      <div class="news__wrapper-item_top" style="width:100%">
        <img src="/storage/{{ $blog->image }}" alt="" style="width:100%">
      </div>
      <div class="news__wrapper-item_bottom">
        <div class="news__wrapper-item_title">
          {{ $blog->name }}
        </div>
        <div class="news__wrapper-item_text">
          {{ $blog->description }}
        </div>
        <div class="news__wrapper-item_button">
          <a href="/blog/{{ $blog->id }}" class="news__wrapper-item_next">{{ __('index.read') }}</a>
          <div class="news__wrapper-item_date">{{ $blog->created_at->format('d.m.Y') }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>

<section class="help">
  <div class="help__wrapper">
    <div class="help__wrapper-left">
      <img src="/images/helper.png" alt="">
    </div>
    <div class="help__wrapper-right">
      <div class="help__wrapper-title">{{ __('index.helpTitle') }}</div>
      <div class="help__wrapper-text">{{ __('index.helpText') }}</div>
      <a href="/product/" class="help__wrapper-btn">{{ __('index.helpBtn') }}</a>
    </div>
  </div>
</section>

<section class="ftg">
  <div class="client__top">
    <div class="client__title title">ТОО FTG COMPANY</div>
    <a href="/company" class="client__full">{{ __('index.read') }}</a>
  </div>
  <div class="ftg__text">{!! $c->col1_3 !!}</div>
</section>


@include('layouts.footer')
</html>
