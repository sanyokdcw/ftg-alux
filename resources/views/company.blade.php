<!DOCTYPE html>
<html lang="ru">
@section('title', 'О компании')
@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">Каталог</div>
  <div class="url__text">{{ __('index.about') }}</div>
</section>

<section class="company">
  <div class="company__title subtitle">{{ __('index.about') }}</div>
  <img src="{{ $c->image? asset("storage/$c->image"): '../images/main-bg-2.jpg' }}" alt="ABOUT BG IMAGE" class="company__img-about">
  {{-- <div class="company__subtitle--first title">ТОО FTG COMPANY</div> --}}
  <div class="company__block">
    <div class="company__block-item">
      {{-- <div class="company__block-title title">{{ $c->col1 }}</div> --}}
      <div class="company__block-subtitle">{{ $c->col1_2 }} </div>
      <div class="company__block-text">
        {!! $c->col1_3 !!}
      </div>
    </div>
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

<section class="sertificate">
  <div class="sertificate__title title">{{ __('index.sert')}} FTG COMPANY</div>
  <div class="sertificate__wrapper swiper-container">
    <div class="swiper-wrapper">
      @foreach ($certificates as $certificate)
      <div class="sertificate__wrapper-item swiper-slide">
         <img class="sertificate_toggle" src="/storage/{{ $certificate->image }}" alt="">
        <div class="sertificate__wrapper-text">{{ $certificate->name }}</div>
      </div>
      @endforeach

    </div>



    <div class="swiper-pagination" style="top: inherit !important;"></div>
  </div>
</section>



@include('layouts.footer')

<div id="modal_for_pic" class="modal_for_pic inactive">
  <img id="modal-close-btn" src="/images/close.svg" class="modal_for_pic-close-btn" alt="">
  <div class="modal_for_pic-pic">
    <img id="modal-image" src="123" alt="" class="pic_img">
  </div>
</div>

<script>
  const certificates = document.querySelectorAll('.sertificate_toggle');
  const modal = document.getElementById('modal_for_pic');
  const modalClose = document.getElementById('modal-close-btn');
  const modalImage = document.getElementById('modal-image');
  certificates.forEach(cert => {
    cert.addEventListener('click', (e) => {
      modalImage.src = cert.src;
      modal.classList.toggle('inactive');
    });
  });
  modal.addEventListener('click', (e) => {
    event.target.classList.toggle('inactive')
  });
  modalClose.addEventListener('click', (e) => {
    modal.classList.toggle('inactive')
  });
</script>
</html>
