<!DOCTYPE html>
<html lang="ru">
@section('title', 'Партнерам')
@include('layouts.catalog')
@include('layouts.header')
@section('content')

<section class="url">
  <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">каталог</div>
  <div class="url__text">{{ __('index.partners')}}</div>
</section>
<section style="min-height: 1215px">
<section class="pather">
  <div class="pather__title subtitle">{{ __('index.partners')}}</div>
  @foreach ($texts as $text)
  <div class="pather__wrapper-item_title title">{{ $text->title }}</div>
  <div class="pather__wrapper">
    <div class="pather__wrapper-item">
      <div class="pather__wrapper-item_text">
          {!! $text->description !!}
      </div>
    </div>
    <div class="pather__wrapper-item">
      <div class="pather__wrapper-item_text">
        {!! $text->description2 !!}
      </div>
    </div>
  </div>
  <div class="pather__wrapper-item_title title" style="text-transform: uppercase;">{{ __('index.patherTitle2')}}</div>
  @endforeach 
  <div class="pather__wrapper">
    @foreach ($cards as $card)
    <div class="pather__wrapper-item">
      <img src="/storage/{{ $card->image }}" alt="">
      <div class="pather__wrapper-item_subtitle">{{ $card->title }}</div>
      <div class="pather__wrapper-item_text">
        {{ $card->text }}
      </div>
    </div>
    @endforeach
  </div>
</section>

<section class="estimation">
  <div class="estimation__title">{{ __('index.partnerEstimationTitle')}}</div>
  <div class="estimation__text">{{ __('index.partnerEstimationText')}}</div>
  <button class="estimation__btn btn-fill" onclick="openModelRight('contact2')">{{ __('index.partnerEstimationBtn')}}</button>
</section>
</section>
        
@include('layouts.footer')
</html>
