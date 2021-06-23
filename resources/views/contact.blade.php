<!D<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@section('content')

        
<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Контакты</div>
</section>

<section class="contact">
  <div class="contact__title subtitle">Контакты</div>
  <div class="contact__wrapper">
    <div class="contact__wrapper-left">
      <div class="contact__wrapper-title">АДРЕС:</div>
      <div class="contact__wrapper-text">
        {!! setting('contacts.address') !!}
      </div>
      <div class="contact__wrapper-title" style="text-transform: uppercase">Телефон:</div>
      <a style="font-size:23px;"  href="tel:+79016543210" class="contact__wrapper-phone title">{{ setting('contacts.telephone') }}</a>
      <div class="contact__wrapper-title">EMAIL:</div>
      <a href="mailto:{{ setting('contacts.email') }}" class="contact__wrapper-email">{{ setting('contacts.email') }}</a>
      <div class="contact__wrapper-title">РЕЖИМ РАБОТЫ:</div>
      <div class="contact__wrapper-text">
        {!! setting('contacts.schedule') !!}
        <br>
        {!! setting('contacts.schedule1') !!}
      </div>
    </div>
    <div class="contact__wrapper-right" style="width: 69%;">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.150735195916!2d30.50318721595899!3d50.47553749343766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce0dcdf7692b%3A0x10f8683c94bed4d5!2z0YPQuy4g0J3QsNCx0LXRgNC10LbQvdC-LdCb0YPQs9C-0LLQsNGPLCAzMiwg0JrQuNC10LIsINCj0LrRgNCw0LjQvdCwLCAwMjAwMA!5e0!3m2!1sru!2sru!4v1620246695071!5m2!1sru!2sru"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>
</section>


@include('layouts.footer')
</html>
