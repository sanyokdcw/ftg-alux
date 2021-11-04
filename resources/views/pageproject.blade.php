<!DOCTYPE html>
<html lang="ru">
@section('title', $project->title)
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
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{ __('blog-show.Catalog') }}</div>
  <div class="url__text"><a href="/projects">{{__('index.projects')}}</a></div>
  <div class="url__text">{{ $project->title }}</div>
</section>

<section class="detail-page">
  <div class="detail-page-title subtitle">{{ $project->title }}</div>
  <div class="detail-page__wrapper">
    <div class="detail-page__left" style="height: 300px">
      <img style="height: 300px" src="/storage/{{ json_decode($project->image, true)[0] }}" alt="">
    </div>
    <div class="detail-page__right">
      <div class="detail-page__right_img">
        <img src="/storage/{{ $project->company_image }}" alt="">
      </div>
      <div class="detail-page__right-text">
        <div>{{ __('card.object') }}:</div>
        <span>{{ $project->object_name }}</span>
      </div>
      <div class="detail-page__right-info">
        <div class="detail-page__right-item">
          <div class="detail-page__right-item_title">
            {{ __('card.term') }}
          </div>
          <div class="detail-page__right-item_text">
            <div class="detail-page__right-item_number">{{ $project->deadline[0] ?? '' }}</div>
            <div class="detail-page__right-item_date">{{ $project->deadline[1] ?? '' }}</div>
          </div>
        </div>
        <div class="detail-page__right-item">
          <div class="detail-page__right-item_title">
            {{ __('card.start') }}
          </div>
          <div class="detail-page__right-item_text">
            <div class="detail-page__right-item_number">{{ $project->start_of_work }}</div>
            {{-- <div class="detail-page__right-item_date">год</div> --}}
          </div>
        </div>
        <div class="detail-page__right-item">
          <div class="detail-page__right-item_title">
            {{ __('card.price') }}
          </div>
          <div class="detail-page__right-item_text">
            @if ($currency == 'KZT')
              <div class="detail-page__right-item_number">{{ number_format($project->price_kz) }}</div>
              <div class="detail-page__right-item_date">{{ __('card.tg') }}</div>
            @elseif($currency == 'USD')
              <div class="detail-page__right-item_number">{{ number_format($project->price_uah) }}</div>
              <div class="detail-page__right-item_date">{{ __('card.dol') }}</div>
            @elseif($currency == 'RUB')
              <div class="detail-page__right-item_number">{{ number_format($project->price_rub) }}</div>
              <div class="detail-page__right-item_date">{{ __('card.rub') }}</div>
            @endif


          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="specifications">
  <div class="specifications__top">
    <div class="specifications__top-item" style="cursor:pointer; color: #78b9eb;" id="Link1" onclick="changeTab(1)">
      {{__('index.task')}}
    </div>
    <div class="specifications__top-item" style="cursor:pointer;" id="Link2" onclick="changeTab(2)">
      {{__('index.solution')}}
    </div>
    <div class="specifications__top-item" style="cursor:pointer;" id="Link3" onclick="changeTab(3)">
      {{__('index.result')}}
    </div>
  </div>
  <div class="specifications__bottom">
    <div class="specifications__bottom-item" style="display:block" id="Tab1">
      {!! $project->task !!}
    </div>
    <div class="specifications__bottom-item" style="display:none" id="Tab2">
      {!! $project->solution !!}
    </div>
    <div class="specifications__bottom-item" style="display:none" id="Tab3">
      {!! $project->result !!}
    </div>

  </div>
</section>

<script>
    function changeTab(tab) {
           if(tab === 1) {
             document.getElementById('Tab1').style.display = "block"
             document.getElementById('Tab2').style.display = "none"
             document.getElementById('Tab3').style.display = "none"

             document.getElementById('Link1').style.color = "#78b9eb"
             document.getElementById('Link2').style.color = "black"
             document.getElementById('Link3').style.color = "black"

           }
  if(tab === 2) {
    document.getElementById('Tab1').style.display = "none"
    document.getElementById('Tab2').style.display = "block"
    document.getElementById('Tab3').style.display = "none"
    document.getElementById('Link1').style.color = "black"
    document.getElementById('Link2').style.color = "#78b9eb"
    document.getElementById('Link3').style.color = "black"
  }
  if(tab === 3) {
    document.getElementById('Tab1').style.display = "none"
    document.getElementById('Tab2').style.display = "none"
    document.getElementById('Tab3').style.display = "block"
    document.getElementById('Link1').style.color = "black"
    document.getElementById('Link2').style.color = "black"
    document.getElementById('Link3').style.color = "#78b9eb"
  }
}

</script>

@include('layouts.footer')
</html>
