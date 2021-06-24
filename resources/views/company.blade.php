<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@section('content')

        
<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Про компанию</div>
</section>

<section class="company">
  <div class="company__title subtitle">ПРО КОМПАНИЮ</div>
  <img src="../images/main-bg-2.jpg" alt="">
  <div class="company__subtitle--first title">ТОО FTG COMPANY</div>
  <div class="company__block">
    <div class="company__block-item">
      <div class="company__block-title title">{{ $c->col1 }}</div>
      <div class="company__block-subtitle">{{ $c->col1_2 }} </div>
      <div class="company__block-text">
        {{ $c->col1_3 }}
      </div>
    </div>
    <div class="company__block-item">
      <div class="company__block-title title">{{ $c->col2 }}</div>
      <div class="company__block-subtitle">{{ $c->col2_2 }}</div>
      <div class="company__block-text">
        {{ $c->col2_3 }}
      </div>
    </div>
    <div class="company__block-item">
      <div class="company__block-title title">{{ $c->col3 }}</div>
      <div class="company__block-subtitle">{{ $c->col3_2 }}</div>
      <div class="company__block-text">
        {{ $c->col3_3 }}
      </div>
    </div>
  </div>
  <div class="company__block company__block-too">
    <div class="company__block-item">
      <div class="company__block-title title">
        {{ $c->col1_4 }}
      </div>
    </div>
    <div class="company__block-item">
      <div class="company__block-text">
        {{ $c->col2_4 }}
      </div>
    </div>
    <div class="company__block-item">
      <div class="company__block-text">
        {{ $c->col3_4 }}
      </div>
    </div>
  </div>
  <div class="company__subtitle subtitle">{{ $c->col5 }}</div>
  <div class="company__text">
    {{ $c->col5_2 }}
  </div>
  <div class="company__wrapper">
    <div class="company__wrapper-item">
      <div class="company__wrapper-title subtitle">
        {{ $c->col4 }}
      </div>
      <div class="company__wrapper-text">
        {{ $c->col4_2 }}
      </div>
    </div>
    <div class="company__wrapper-item">
      <img src="../images/news/item-3.jpg" alt="">
    </div>
    <div class="company__wrapper-item">
      <div class="company__wrapper-title">
        {{ $c->col6 }}
      </div>
      <div class="company__wrapper-text">
        {{ $c->col6_2 }}
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
  <div class="sertificate__title title">СЕРТИФИКАТЫ FTG COMPANY</div>
  <div class="sertificate__wrapper swiper-container">
    <div class="swiper-wrapper">
      @foreach ($certificates as $certificate)
      <div class="sertificate__wrapper-item swiper-slide">
         {{-- <img src="/storage/{{ $certificate->image }}" alt=""> --}}
        <img class="sertificate_toggle" src="https://ftgdcw.a-lux.dev/storage/certificates/June2021/j8dqEWsjh7CtJdVtDmVy.png" alt="">
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
