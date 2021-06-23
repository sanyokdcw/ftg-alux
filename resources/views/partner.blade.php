<!DOCTYPE html>
<html lang="ru">
@include('layouts.catalog')
@include('layouts.header')
@section('content')

<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Партнерам</div>
</section>

<section class="pather">
  <div class="pather__title subtitle">ПАРТНЕРАМ</div>
  <div class="pather__wrapper-item_title title">ЧТО ЗНАЧИТ БЫТЬ ДИЛЕРОМ FTG COMPANY?</div>
  <div class="pather__wrapper">
    <div class="pather__wrapper-item">
      <div class="pather__wrapper-item_text">
        Быть дилером компании FTG Company - это обеспечивать чистой водой дома и предприятия
        по всей стране, зарабатывая на продаже оборудования FTG вместе с нами.
      </div>
    </div>
    <div class="pather__wrapper-item">
      <div class="pather__wrapper-item_text">
        Мы помогаем дилерам стать экспертами в области очистки воды, продаже, установке и
        обслуживанию оборудования FTG, а также вывести свой бизнес на новый, более
        профессиональный уровень.
      </div>
    </div>
  </div>
  <div class="pather__wrapper-item_title title" style="text-transform: uppercase;">Ты можешь стать дилером FTG Company!</div>
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
  <div class="estimation__title">Оцените преимущества партнерства!</div>
  <div class="estimation__text">Присоединяйся</div>
  <button class="estimation__btn btn-fill" onclick="openModelRight('contact2')">Заполнить форму</button>
</section>

        
@include('layouts.footer')
</html>