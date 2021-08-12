<!DOCTYPE html>
<html lang="ru">
@section('title', 'Контакты')
@include('layouts.catalog')
@include('layouts.header')
@section('content')

        <div class="content_wrapper">
<div class="content_wrapper__content">
<section class="url">
  <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
  <div class="url__text">{{ __('index.contacts')}}</div>
</section>

<section class="contact" style="
    min-height: 1200px;
">
  <div class="contact__title subtitle">{{ __('index.contacts')}}</div>
  <div class="contact__wrapper">
    <div class="contact__wrapper-left">
      <div class="contact__wrapper-title">{{__('index.address')}}</div>
      <div class="contact__wrapper-text">
        {!! setting('contacts.address') !!}
      </div>
      <div class="contact__wrapper-title" style="text-transform: uppercase">{{__('index.phone')}}</div>
      <a style="font-size:20px;"  href="tel:+77273173652" class="contact__wrapper-phone title">+7 727 317 36 52</a>
      <a style="font-size:20px;"  href="tel:+77082150492" class="contact__wrapper-phone title">+7 708 215 04 92</a>
      <div class="contact__wrapper-title" style="margin-top: 20px;">EMAIL:</div>
      <a href="mailto:{{ setting('contacts.email') }}" class="contact__wrapper-email">{{ setting('contacts.email') }}</a>
      <div class="contact__wrapper-title">{{__('index.operating')}}</div>
      <div class="contact__wrapper-text">
        {!! setting('contacts.schedule') !!}
        <br>
        {!! setting('contacts.schedule1') !!}
      </div>
    </div>
    <div class="contact__wrapper-right" style="width: 69%;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.7091046004866!2d76.84981521499131!3d43.23655828729066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388369bed7ecb02b%3A0x286dbe6388a6b40e!2z0YPQuy4g0JrQsNCx0LTQvtC70L7QstCwIDE2LCDQkNC70LzQsNGC0YsgMDUwMDAwLCDQmtCw0LfQsNGF0YHRgtCw0L0!5e0!3m2!1sru!2sru!4v1624621357820!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</section>
</div>
<div class="content_wrapper__footer">
@include('layouts.footer')
</div>
</div>
</html>
