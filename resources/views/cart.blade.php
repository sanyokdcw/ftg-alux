<!DOCTYPE html>
<html lang="ru">
@section('title', 'Корзина')
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
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">Каталог</div>
  <div class="url__text">{{__('index.basket')}}</div>
</section>

<section class="cart">
  <div class="cart__title subtitle">{{__('index.basket')}}</div>
  @if (Session::has('message'))
    <div class="form-data_error">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <p class="form-data_error-body">{{ Session::get('message') }}</p>
    </div>
  @endif
  <div class="cart__wrapper">
    <div class="cart__wrapper-left">
      <div class="cart__wrapper-left_title">ИНФОРМАЦИЯ ПОКУПАТЕЛЯ</div>
      {{-- <button class="cart__wrapper-left_btn">Я новый покупатель</button> --}}
      @if (!Auth::check())
      <form action="/add-guest-order" method="POST">
      <div class="cart__wrapper-form">
          <div class="cart__wrapper-form_input">
            <input type="text" placeholder="Имя" name="name" value="" required>
          </div>
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="cart__wrapper-form_input">
            <input type="text" placeholder="Фамилия" name="surname" value="" required>
          </div>
          @error('surname')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="cart__wrapper-form_input">
            <input type="phone" placeholder="Телефон" name="telephone" value="" required >
          </div>
          @error('telephone')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="cart__wrapper-form_input">
            <input type="email" placeholder="Электронная почта" name="mail">
          </div>
          @error('mail')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        @else
        <form action="/add-order" method="POST">
        <div class="cart__wrapper-form">
          <div class="cart__wrapper-form_input">
            <input type="text" placeholder="Имя" name="name" value="{{ Auth::user()->name}}" required>
          </div>
          <div class="cart__wrapper-form_input">
            <input type="text" placeholder="Фамилия" name="surname" value="{{ Auth::user()->surname }}" required>
          </div>
          <div class="cart__wrapper-form_input">
            <input type="phone" placeholder="Телефон" name="telephone" value="{{ Auth::user()->number }}" required >
          </div>
          <div class="cart__wrapper-form_input">
            <input type="email" placeholder="Электронная почта" name="mail" value="{{ Auth::user()->email }}" required>
          </div>
        @endif
      </div>
      <div class="cart__wrapper-left_title">СПОСОБ ДОСТАВКИ</div>
      <div class="cart__wrapper-form">
        @foreach ($deliveries as $delivery)
          <div class="cart__wrapper-left_select">
            <select name="delivery_{{ $loop->index }}" class="cart__wrapper-left_output" required>
              <option value="{{ $delivery->name }}">{{ $delivery->name }}</option>
              @foreach ($delivery->methods as $method)
              <option value="{{ $method->name }}">{{ $method->name }}</option>
              @endforeach
            </select>
              @error("delivery_{{ $loop->index }}")
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
        @endforeach
      </div>


      <div class="cart__wrapper-left_title">СПОСОБ оплаты</div>
      <div class="cart__wrapper-left_select">
          <select class="cart__wrapper-left_output" name="payment" required>
            <option value="cash">Наличными</option>
            <option value="card">Картой</option>
          </select>
          @error('payment')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      <textarea style="width:500px" class="cart__wrapper-left_textarea" name="comment" placeholder="Комментировать"></textarea>
    </div>

    <div class="cart__wrapper-right">
      @if (!Auth::check())
      @else
      @endif
      @csrf
      @foreach ($cart_items as $item)
        @php
          if(!Auth::check()){
            $product = \App\Models\Product::find($item['product_id']);
          }
          else{
            $product = \App\Models\Product::find($item->product_id);
          }
        @endphp

          @php
          if($product->sale != 0) {
            $product->price_kz = $product->price_kz - ( $product->price_kz * ($product->sale / 100));
            $product->price_ru = $product->price_ru - ( $product->price_ru * ($product->sale / 100));
            $product->price_uah = $product->price_uah - ( $product->price_uah * ($product->sale / 100));
          }
          @endphp
        <input type="hidden" name="products[]" value="{{ $product->id }}">
        <a href="/product/{{$product->slug}}" class="cart__wrapper-right_title title">
          {{ $product->name }}
        </a>
        <div class="cart__wrapper-right_product">
          <div class="cart__wrapper-right_img">
            <img src="/storage/{{ $product->image }}" alt="">
          </div>
          <div class="cart__wrapper-right_count">
            <button type="button" class="cart__wrapper-right_minus" onclick="countDecrement{{ $loop->index }}()">-</button>
            @if (!Auth::check())
            <div class="cart__wrapper-right_number"><span id="counter{{ $loop->index }}">{{ $item['quantity'] }} </span></div>
            <input type="hidden" name="quantities[]" value="{{ $item['quantity'] }}">
            @else
            <div class="cart__wrapper-right_number"><span id="counter{{ $loop->index }}">{{ $item->quantity }} </span></div>
            @endif
            <button type="button" class="cart__wrapper-right_plus" onclick="countIncrement{{ $loop->index }}()">+</button>
          </div>
        <input type="hidden" id="item_price{{ $loop->index }}" value="{{ $product->price_kz }}">



        @if ($currency == 'KZT')
        <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">
          @if (!Auth::check())
          {{ number_format(($product->price_kz) * $item['quantity'],0,","," ") }}</span>
          @else
          {{ number_format(($product->price_kz) * $item->quantity,0,","," ") }}</span>
          @endif
          тг
        @elseif($currency == 'USD')
        @if (!Auth::check())
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_uah * $item['quantity'],0,","," ") }}</span>
        @else
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_uah * $item->quantity,0,","," ") }}</span>
        @endif
          долл
        @elseif($currency == 'RUB')
        @if (!Auth::check())
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_ru * $item['quantity'],0,","," ") }}</span>
        @else
          <div class="cart__wrapper-right_subprice title"><span class="item_sum" id="item_sum{{ $loop->index }}">{{ number_format($product->price_ru * $item->quantity,0,","," ") }}</span>
        @endif
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

      <input type="hidden" name="sum" id="sum_hidden" value="{{ $discountSum }}">

      <div class="cart__wrapper-right_text">
        <div>Стоимость товаров:</div>
        <span> <span id=""> {{ number_format($discountSum,0,","," ") }} </span>
        @if ($currency == 'KZT')
            тг
        @elseif($currency == 'USD')
            долл
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
          @elseif($currency == 'USD')
            долл
          @elseif($currency == 'RUB')
            руб
          @endif
        </span>
      </div>
      <button type="submit" class="cart__wrapper-right_btn">ОФОРМИТЬ ЗАКАЗ</button>
    </form>

    <form action="/consultation" method="POST" id="number-form">
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
  <div class="popular__title subtitle">{{__('index.popularTitle')}}</div>
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
        @elseif($currency == 'USD')
            долл
        @elseif($currency == 'RUB')
            руб
        @endif
      </div>
      <a class="card__wrapper-btn"  href="/product/{{ $p->slug }}" style="color: #112468">{{__('index.more')}}</a>
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
