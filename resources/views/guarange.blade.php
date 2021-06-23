<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Гарантия и сервис</div>
</section>

<div class="guarange">
  <div class="guarange__title subtitle">ГАРАНТИЯ И СЕРВИС</div>
  <div class="guarange__wrapper">
    @foreach ($guarantees as $guarantee)
      <div class="guarange__wrapper-item">
        <div class="guarange__wrapper-title title">
          <img src="/storage/{{ $guarantee->image }}" alt="">
          <span>{{ $guarantee->title }}</span>
        </div>
        <div class="guarangewrapper-text"> 
        {!! $guarantee->text !!}
        </div>
      </div>
    @endforeach
  </div>
</div>

<section class="estimation">
  <div class="estimation__title">Возникли вопросы?</div>
  <div class="estimation__text">Мы обязательно Вам поможем!</div>
  <button class="estimation__btn btn-contact" onclick="openModelRight('contact2')">Связаться с нами</button>
</section>


@include('layouts.footer')
</html>
