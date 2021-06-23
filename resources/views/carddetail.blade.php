<!DOCTYPE html>
<html lang="ru">

@include('layouts.catalog')
@include('layouts.header')
@php
  if (session('currency') == null){
    session(['currency' => 'KZT']);
  }
  $currency = session('currency');
@endphp
<section class="url">
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text"><a href="/subcategory/{{ App\Models\Subcategory::find($product->subcategory_id)->id }}">{{ strip_tags(App\Models\Subcategory::find($product->subcategory_id)->name) }}</a></div>
  <div class="url__text">{{ $product->name }}</div>
</section>

<section class="card-detail">
  <div class="card-detail__title subtitle">{{ $product->name }}</div>
  <div class="card-detail__wrapper">
    <div class="card-detail__wrapper-left">
      <div class="card-detail__wrapper-left_img">
        <img src="/storage/{{ $product->image }}" alt="" style="width:100%">
      </div>
    </div>
    <div class="card-detail__wrapper-right">
      <div class="card-detail__wrapper-right_info">
        <div class="card-detail__wrapper-right_text">
          <div>Артикул:</div>
          <span>{{ $product->article }}</span>
        </div>
        <div class="card-detail__wrapper-right_text">
          <div>Наличие:</div>
          <span>{{ $product->existence }}</span>
        </div>
      </div>
      <div class="card-detail__wrapper-right_price">
        @if ($currency == 'KZT')
       <span id="item_price">   {{  number_format($product->price_kz,0,","," ") }} 
      </span>
      тенге
        @elseif($currency == 'UAH')
<span id="item_price">
          {{  number_format($product->price_uah,0,","," ") }} 
</span>
гривен
        @elseif($currency == 'RUB')
<span id="item_price">       
   {{  number_format($product->price_ru,0,","," ") }} 
</span>
рублей
      @endif
      </div>
      <div class="card-detail__wrapper-right_block">
        <div class="card-detail__wrapper-right_count">
          <button class="card-detail__wrapper-right_minus" onclick="countDecrement()">-</button>
          <div class="card-detail__wrapper-right_number" id="counter">1</div>
          <button class="card-detail__wrapper-right_plus" onclick="countIncrement()">+</button>
        </div>
        <div class="card-detail__wrapper-right_subprice title" style="font-size: 21px;">

          @if ($currency == 'KZT')
<span id="total_price"> 
 {{ number_format($product->price_kz,0,","," ") }}
</span>
 тг
          @elseif($currency == 'UAH')
       <span id="total_price">
     {{ number_format($product->price_uah,0,","," ") }} 
</span>          
грн
@elseif($currency == 'RUB')
<span id="total_price">       
     {{  number_format($product->price_ru,0,","," ") }} 
</span>          
руб
@endif
</span>
        </div>
        <form action="/cart-add" method="POST">
          @csrf
          <input type="hidden" name="quantity" id="quantity" value="1">
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <button class="card-detail__wrapper-right_btn" type="submit">заказать</button>
        </form>
      </div>
    <form action="/request" method="POST" id="number-form">
      <div class="card-detail__wrapper-right_consultation">
        <div class="card-detail__wrapper-right_phone">
          <input type="phone" name="phone" required="required" id="number">
        </div>
	    @csrf        
      <button type="button" onclick="sendNumber()" class="card-detail__wrapper-right_order">Заказать консультацию</button>
     </div>
    </form> 
    </div>
  </div>
</section>

<section class="specifications">
  <div class="specifications__top">
    <div class="specifications__top-item" id="Link1"  onclick="changeTab(1)" style="cursor: pointer; color: rgb(120, 185, 235);">
      Описание
    </div>
    <div class="specifications__top-item" id="Link2"  onclick="changeTab(2)" style="cursor:pointer">
      Характеристики
    </div>
    <div class="specifications__top-item" id="Link3"  onclick="changeTab(3)" style="cursor:pointer">
      Документация
    </div>
  </div>
  <div class="specifications__bottom">
    <div class="specifications__bottom-item" id="Tab1" style="display: block;">
    {!! strip_tags($product->description) !!}
	
    </div>
    <div class="specifications__bottom-item" id="Tab2" style="display: none;">
    {!! strip_tags($product->characteristics) !!}
    </div>

    <div class="specifications__bottom-item" id="Tab3" style="display: none;">
    {!! strip_tags($product->documentation) !!}
    </div>

  </div>
</section>

<section class="help">
  <div class="help__wrapper">
    <div class="help__wrapper-left">
      <img src="../images/help-bg.png" alt="">
    </div>
    <div class="help__wrapper-right">
      <div class="help__wrapper-title">Помощник при выборе систем</div>
      <div class="help__wrapper-text">Мы обязательно Вам поможем!</div>
      <a href="/product" class="help__wrapper-btn">Подобрать СИСТЕМУ</a>
    </div>
  </div>
</section>

<section class="popular">
  <div class="popular__title subtitle">Популярные товары</div>
  <div class="popular__wrapper">
    @foreach ($products as $product)
    <div class="card__wrapper-item">
      <div class="card__wrapper-img" style="background-image: url(/storage/{{ $product->image }});"></div>
      <div class="card__wrapper-text">
        {{ $product->name }}
      </div>
      @if ($currency == 'KZT')
        <div class="card__wrapper-price"><span>{{ number_format($product->price_kz,0,","," ") }}</span> тг</div>
      @elseif($currency == 'UAH')
        <div class="card__wrapper-price"><span>{{ number_format($product->price_uah,0,","," ") }}</span> грн</div>
      @elseif($currency == 'RUB')
        <div class="card__wrapper-price"><span>{{ number_format($product->price_rub,0,","," ") }}</span> руб</div>
      @endif
      <a href="/product/{{ $product->id }}" class="card__wrapper-btn">Подробнее</a>
    </div>
    @endforeach
  </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function countIncrement() {
    let count = document.getElementById("counter")
    let price = document.getElementById("item_price")  
    let total_price = document.getElementById("total_price")
    let newPrice = Number(total_price.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, '')) + Number(price.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, ''))
    total_price.innerHTML = `${addSpaces(newPrice)}`
    let newCount = parseInt(count.innerHTML) + 1
    count.innerHTML = `${newCount}`
    document.getElementById('quantity').value = newCount
  }

  function countDecrement() {
    let count = document.getElementById("counter")
    
    if(parseInt(count.innerHTML) > 1) {
    let price = document.getElementById("item_price")  
      
    let total_price = document.getElementById("total_price")
    let newPrice = Number(total_price.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, '')) - Number(price.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, ''))
    total_price.innerHTML = `${addSpaces(newPrice)}`
      
    let newCount = parseInt(count.innerHTML) - 1
      count.innerHTML = `${newCount}`
      document.getElementById('quantity').value = newCount
    }
  }

  function addSpaces(n) {
    let num = Number(n)
    let result = new Intl.NumberFormat('ru-RU').format(num)
    
    return result.toString()
  }

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

function sendNumber() {
    let number = document.getElementById('number').value.replace(/[^\d.-]/g, '')
    if(number.length != 13)
    {
      Swal.fire(
        'Пожалуйста, введите корректный номер',
        '',  
        'error'
      )
    }
    else {
      document.getElementById('number-form').submit()
    }
}


@if (session('cart'))


Swal.fire(
  'Товар успешно добавлен в корзину',
'',  
'success'
)


@endif
</script>



@include('layouts.footer')
</html>
