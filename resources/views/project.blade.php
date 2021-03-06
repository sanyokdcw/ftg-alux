<!DOCTYPE html>
<html lang="ru">
@section('title', 'Наши Проекты')
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
  <div class="url__text">{{__('index.projects')}}</div>
</section>

<section class="project">
  <div class="project__title subtitle">{{__('index.projects')}}</div>
  <div class="project__wrapper">
    @foreach ($projects as $project)
    <div class="project__wrapper-card">
      <div class="project__wrapper-left">
        
        <div class="swiper-container mySwiper2">
          <div class="swiper-wrapper">
            @foreach (json_decode($project->image, true) as $image)
            <div class="swiper-slide">
              <img src="/storage/{{ $image }}"  style="width: 100%"/>
            </div>
            @endforeach
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        
        <div class="swiper-container mySwiper">
          <div class="swiper-wrapper">
            @foreach (json_decode($project->image, true) as $image)
            <div class="swiper-slide">
              <div class="project__wrapper-img" style="background-image: url(/storage/{{ str_replace ( '\\', '/', $image)}});">
              </div>
            </div>
            @endforeach
          </div>
        </div>


        <div class="project__wrapper-info">
          <div class="project__wrapper-info_item">
            <div class="project__wrapper-info_title">
              {{__('index.projectInfo1')}}
            </div>
            <div class="project__wrapper-info_number">
                {{ $project->deadline[0] }} 
                @if(count($project->deadline) == 2)
                  <span>{{ $project->deadline[1] }}<span>
                @endif
            </div>
          </div>
          <div class="project__wrapper-info_item">
            <div class="project__wrapper-info_title">
              {{__('index.projectInfo2')}}
            </div>
            <div class="project__wrapper-info_number">
              {{ $project->start_of_work }} 
            </div>
          </div>
          <div class="project__wrapper-info_item">
            <div class="project__wrapper-info_title">
              {{__('index.projectInfo3')}}
            </div>
            <div class="project__wrapper-info_number">
              @if ($currency == 'KZT')
                {{ number_format($project->price_kz) }} <span>{{ __('card.tg') }}</span>
              @elseif($currency == 'USD')
                {{ number_format($project->price_uah) }} <span>{{ __('card.dol') }}</span>
              @elseif($currency == 'RUB')
                {{ number_format($project->price_rub) }} <span>{{ __('card.rub') }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="project__wrapper-right">
        <div class="project__wrapper-title title">
          {{ $project->title }}
        </div>
        <div class="project__wrapper-subtitle">
          {{ $project->description }}
        </div>
        <div class="project__wrapper-button">
          <button class="project__wrapper-btn {{ $loop->index }}" onclick="changeTab(event, 'task{{ $loop->index }}')">{{__('index.task')}}</button>
          <button class="project__wrapper-btn {{ $loop->index }}" onclick="changeTab(event, 'solution{{ $loop->index }}')">{{__('index.solution')}}</button>
          <button class="project__wrapper-btn {{ $loop->index }}" onclick="changeTab(event, 'result{{ $loop->index }}')">{{__('index.result')}}</button>
        </div>
        <div class="project__wrapper-block">
          <div class="project__wrapper-text" id="task{{ $loop->index }}" style="margin-top: 0 !important;">
            {{ $project->task }}
          </div>
          <div class="project__wrapper-text" id="solution{{ $loop->index }}" style="display:none;margin-top:0 !important;">
            {{ $project->solution }}
          </div>
          <div class="project__wrapper-text" id="result{{ $loop->index }}" style="display:none;margin-top:0 !important;">
            {{ $project->result }}
          </div>
<div class="project__wrapper-block_bg"></div>
        </div>
        <div class="blog__button">
          <a href="/project/{{ $project->slug }}" class="blog__button-link">{{__('index.read')}}</a>
        </div>
      </div>

    </div>

    @endforeach
  </div>

</section>

<script>
  function changeTab(evt,type) {

      @foreach($projects as $p)
      btns = document.getElementsByClassName("{{ $loop->index }}");
      for (i = 0; i < btns.length; i++) {
        btns[i].style = "border: 1px solid #f7f9fa;"
      }

      if(type == 'task{{ $loop->index }}') {
        document.getElementById('task{{ $loop->index }}').style.display = "block";
        document.getElementById('result{{ $loop->index }}').style.display = "none";
        document.getElementById('solution{{ $loop->index }}').style.display = "none";

        evt.currentTarget.style = "border: 1px solid #112468; background-color: #fff;";
      }
      if(type == 'solution{{ $loop->index }}') {
        document.getElementById('solution{{ $loop->index }}').style.display = "block";
        document.getElementById('task{{ $loop->index }}').style.display = "none";
        document.getElementById('result{{ $loop->index }}').style.display = "none";
        evt.currentTarget.style = "border: 1px solid #112468; background-color: #fff;";

      }
      if(type == 'result{{ $loop->index }}') {
        document.getElementById('result{{ $loop->index }}').style.display = "block";
        document.getElementById('task{{ $loop->index }}').style.display = "none";
        document.getElementById('solution{{ $loop->index }}').style.display = "none";
        evt.currentTarget.style = "border: 1px solid #112468; background-color: #fff;";
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
