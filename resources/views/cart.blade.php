<!DOCTYPE html>
<html lang="ru">

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
  <div class="url__text"><a href="/">Главная</a></div>
  <div class="url__text">Корзина</div>
</section>

<section class="cart">
  <div class="cart__title subtitle">КОРЗИНА</div>
  <div class="cart__wrapper">
    <div class="cart__wrapper-left">
      <div class="cart__wrapper-left_title">ИНФОРМАЦИЯ ПОКУПАТЕЛЯ</div>
      {{-- <button class="cart__wrapper-left_btn">Я новый покупатель</button> --}}
      <div class="cart__wrapper-form">
        <div class="cart__wrapper-form_input">
          <input type="text" placeholder="Имя" value="{{ Auth::user()->name }}" required>
        </div>
        <div class="cart__wrapper-form_input">
          <input type="text" placeholder="Фамилия" value="{{ Auth::user()->surname }}" required>
        </div>
        <div class="cart__wrapper-form_input">
          <input type="phone" placeholder="Телефон" value="{{ Auth::user()->number }}" required >
        </div>
        <div class="cart__wrapper-form_input">
          <input type="email" placeholder="Электронная почта" value="{{ Auth::user()->email }}" required>
        </div>
      </div>
      <div class="cart__wrapper-left_title">СПОСОБ ДОСТАВКИ</div>
      <div class="cart__wrapper-form">
      <div class="cart__wrapper-left_select">
          <select class="cart__wrapper-left_output">
            <option value="">Город</option>
            <option value="">Алматы</option>
            <option value="">Алматы</option>
            <option value="">Алматы</option>
          </select>
        </div>

        <div class="cart__wrapper-left_select">
          <select class="cart__wrapper-left_output">
            <option value="">Отделение</option>
            <option value="">Отделение</option>
            <option value="">Отделение</option>
            <option value="">Отделение</option>
          </select>
        </div>

        <div class="cart__wrapper-left_select">
          <select class="cart__wrapper-left_output">
            <option value="">Доставка почтой</option>
            <option value="">Самовывоз</option>
          </select>
        </div>
      </div>


      <div class="cart__wrapper-left_title">СПОСОБ оплаты</div>
      <div class="cart__wrapper-left_select">
          <select class="cart__wrapper-left_output">
            <option value="">Наличными</option>
            <option value="">Картой</option>
          </select>
        </div>
      <textarea style="width:500px" class="cart__wrapper-left_textarea" placeholder="Комментировать"></textarea>
    </div>
    
    <div class="cart__wrapper-right">
      <form action="/add-order" method="POST">
      @csrf
      @foreach ($cart_items as $item)
        @php
          $product = \App\Models\Product::find($item->product_id);
        @endphp

          @php
          if($product->sale != 0) {
            $product->price_kz = $product->price_kz - ( $product->price_kz * ($product->sale / 100));   
           $product->price_ru = $product->price_ru - ( $product->price_ru * ($product->sale / 100));   
           $product->price_uah = $product->price_uah - ( $product->price_uah * ($product->sale / 100));   

          }
          @endphp
        <input type="hidden" name="products[]" value="{{ $product->id }}">
      <div class="cart__wrapper-right_title title">
        {{ $product->name }}
      </div>
      <div class="cart__wrapper-right_product">
        <div class="cart__wrapper-right_img">
          <img src="/storage/{{ $product->image }}" alt="">
        </div>
        <div class="cart__wrapper-right_count">
          <button type="button" class="cart__wrapper-right_minus" onclick="countDecrement{{ $loop->index }}()">-</button>
          <div class="cart__wrapper-right_number"><span id="counter{{ $loop->index }}">{{ $item->quantity }} </span></div>
          <button type="button" class="cart__wrapper-right_plus" onclick="countIncrement{{ $loop->index }}()">+</button>
        </div>
        <input type="hidden" id="item_price{{ $loop->index }}" value="{{ $product->price_kz }}">



        @if ($currency == 'KZT')
        <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">

          {{ number_format(($product->price_kz) * $item->quantity,0,","," ") }}</span> 
          тг
        @elseif($currency == 'UAH')
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_uah * $item->quantity,0,","," ") }}</span> 
          грн
        @elseif($currency == 'RUB')
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_ru * $item->quantity,0,","," ") }}</span> 
          руб
          @endif
          </div>
        <div class="remove-form" style="margin-bottom: auto">
          <img src="/images/cancel.png" alt="" onclick="sendRemoveForm({{ $product->id }})">
        </div>

      </div>
      @if($product->sale != 0)
      <div class="cart__wrapper-right_text">
        <div>Скидка:</div>
        <span>{{ $product->sale }}%</span>
      </div>
      @endif
      @endforeach

      <input type="hidden" name="sum" id="sum_hidden" value="{{ $sum }}">
     
      <div class="cart__wrapper-right_text">
        <div>Стоимость товаров:</div>
        <span> <span id=""> {{ number_format($sum,0,","," ") }} </span> 
        @if ($currency == 'KZT')
            тг
        @elseif($currency == 'UAH')
            грн
        @elseif($currency == 'RUB')
            руб
        @endif
        </span>
      </div> 

      <div class="cart__wrapper-right_text cart__wrapper-right_result">
        <div>ИТОГО К ОПЛАТЕ:</div>
        <span> <span id="sum"> {{ number_format($discountSum,0,","," ") }} </span> 
          @if ($currency == 'KZT')
            тг
          @elseif($currency == 'UAH')
            грн
          @elseif($currency == 'RUB')
            руб
          @endif
        </span>
      </div>
      <button type="submit" class="cart__wrapper-right_btn">ОФОРМИТЬ ЗАКАЗ</button>
    </form>

    <form action="/request" method="POST" id="number-form">
      @csrf
      <div class="cart__wrapper-right_consultation">
        <div class="cart__wrapper-right_input">
          <input type="text" name="phone" id="number">
        </div>

        <button type="button"  onclick="sendNumber()" class="card-detail__wrapper-right_order">Заказать консультацию</button>
      </div>
    </form>  
    </div>
  </div>
</section>

<section class="popular">
  <div class="popular__title subtitle">Популярные товары</div>
  <div class="popular__wrapper">
    @foreach ($popular as $p)
        
    <div class="card__wrapper-item">
      <div class="card__wrapper-img" style="background-image: url(/storage/{{ $p->image }});"></div>
      <div class="card__wrapper-text">
        {{ $p->name }}
      </div>
      <div class="card__wrapper-price"><span>{{ number_format($p->price_kz,0,","," ") }}</span> 
        @if ($currency == 'KZT')
            тг
        @elseif($currency == 'UAH')
            грн
        @elseif($currency == 'RUB')
            руб
        @endif
      </div>
      <a class="card__wrapper-btn"  href="/product/{{ $p->id }}" style="color: #112468">Подробнее</a>
    </div>

    @endforeach
  </div>
</section>
<form action="/cart-remove" method="POST" id="remove_form">
  @csrf
  <input type="hidden" name="product_id" id="product_id" value="">
</form>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
	
Swal.fire(
  'Ваша заявка принята',
  'Мы вам перезвоним',
  'success'
)
</script>
@endif
<script>
  function sendRemoveForm(id) {
    document.getElementById('product_id').value = id
    document.getElementById('remove_form').submit()
  }
  @foreach($cart_items as $item)
  function countIncrement{{ $loop->index }}() {
    let count = document.getElementById("counter{{ $loop->index }}")
    let newCount = parseInt(count.innerHTML) + 1
    count.innerHTML = `${newCount}`

    let price = document.getElementById("item_price{{ $loop->index }}")
    let item_sum = document.getElementById("item_sum{{ $loop->index }}")
    item_sum_value = item_sum.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, '');

    let new_sum = parseInt(item_sum_value) + parseInt(price.value)
    item_sum.innerHTML = `${addSpaces(new_sum)}`
    countSum()
  }

  function countDecrement{{ $loop->index }}() {
    let count = document.getElementById("counter{{ $loop->index }}")

    if(parseInt(parseInt(count.innerHTML)) > 1) {
      let newCount = parseInt(count.innerHTML) - 1
      count.innerHTML = `${newCount}`
      let price = document.getElementById("item_price{{ $loop->index }}")
      let item_sum = document.getElementById("item_sum{{ $loop->index }}")
      item_sum_value = item_sum.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, '');

      let new_sum = parseInt(item_sum_value) - parseInt(price.value)
      item_sum.innerHTML = `${addSpaces(new_sum)}`
      countSum()
    }
  }
  @endforeach

  function countSum() {
    let prices = document.querySelectorAll('.item_sum')
    let sum = 0
    let sumHTML = document.getElementById('sum')
    let sumDiscount = document.getElementById('sum_discount')
    for (let i = 0; i < prices.length; i++) {
      let element = prices[i]
      element = element.innerHTML.replace(/\s/g, '').replace(/&nbsp;/g, '');
      sum +=  parseInt(element)
  }

    document.getElementById('sum_hidden').value = sum
    sumHTML.innerHTML = `${addSpaces(sum)}`
  }

function addSpaces(n) {
  let num = Number(n)
  let result = new Intl.NumberFormat('ru-RU').format(num)
  
  return result.toString()
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


</script>
@include('layouts.footer')
</html>