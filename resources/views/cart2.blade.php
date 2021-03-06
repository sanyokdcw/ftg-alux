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
  <div class="url__text"><a href="/">{{__('index.main')}}</a></div>
  <div class="url__text">{{__('index.basket')}}</div>
</section>

<section class="cart">
  <div class="cart__title subtitle">{{__('index.basket')}}</div>
  <div class="cart__wrapper">
    <div class="cart__wrapper-left">
      <div class="cart__wrapper-left_title">{{ __('card.info') }}</div>
      {{-- <button class="cart__wrapper-left_btn">Я новый покупатель</button> --}}
      <div class="cart__wrapper-form">
        <div class="cart__wrapper-form_input">
          <input type="text" placeholder="{{ __('card.name') }}" value="{{ Auth::user()->name }}" required>
        </div>
        <div class="cart__wrapper-form_input">
          <input type="text" placeholder="{{ __('card.surname') }}" value="{{ Auth::user()->surname }}" required>
        </div>
        <div class="cart__wrapper-form_input">
          <input type="phone" placeholder="{{ __('card.phone') }}" value="{{ Auth::user()->number }}" required >
        </div>
        <div class="cart__wrapper-form_input">
          <input type="email" placeholder="{{ __('card.email') }}" value="{{ Auth::user()->email }}" required>
        </div>
      </div>
      <div class="cart__wrapper-left_title">{{ __('card.delivery') }}</div>
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
        <input type="hidden" name="products[]" value="{{ $product->id }}">
      <div class="cart__wrapper-right_title title">
        {{ $product->name }}
      </div>
      <div class="cart__wrapper-right_product">
        <div class="cart__wrapper-right_img">
          <img src="/storage/{{ $product->image }}" alt="">
        </div>
        <div class="cart__wrapper-right_count">
          <div class="cart__wrapper-right_number">Количество - {{ $item->quantity }}</div>
        </div>
        @if ($currency == 'KZT')
        <div class="cart__wrapper-right_subprice title"><span>{{ number_format($product->price_kz * $item->quantity,0,","," ") }}</span>
          тг
        @elseif($currency == 'USD')
          <div class="cart__wrapper-right_subprice title"><span>{{ number_format($product->price_uah * $item->quantity,0,","," ") }}</span>
          долл
        @elseif($currency == 'RUB')
          <div class="cart__wrapper-right_subprice title"><span>{{ number_format($product->price_ru * $item->quantity,0,","," "
) }}</span>
          руб
          @endif
        </div>
        <div class="remove-form" style="margin-bottom: auto">
          <img src="/images/cancel.png" alt="" onclick="sendRemoveForm({{ $product->id }})">
        </div>

      </div>
      @endforeach
      <input type="hidden" name="sum" value="{{ $sum }}">
      {{-- <div class="cart__wrapper-right_text">
        <div>Стоимость товаров:</div>
        <span>{{ number_format($sum,0,","," ") }}
        @if ($currency == 'KZT')
            тг
        @elseif($currency == 'USD')
            долл
        @elseif($currency == 'RUB')
            руб
        @endif
        </span>
      </div> --}}
      {{-- <div class="cart__wrapper-right_text">
        <div>3книжка:</div>
        <span>-</span>
      </div> --}}
      <div class="cart__wrapper-right_text cart__wrapper-right_result">
        <div>ИТОГО К ОПЛАТЕ:</div>
        <span>{{ number_format($sum,0,","," ") }}
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
      <div class="cart__wrapper-right_consultation">
        <div class="cart__wrapper-right_input">
          <input type="text" name="phone">
        </div>
        <button class="cart__wrapper-right_order">Заказать консультацию</button>
      </div>
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
      @if ($currency == 'KZT')
        <div class="card__wrapper-price"><span>{{ number_format($p->price_kz,0,","," ") }}</span>
        тг
      @elseif($currency == 'USD')
        <div class="card__wrapper-price"><span>{{ number_format($p->price_uah,0,","," ") }}</span>
        долл
      @elseif($currency == 'RUB')
        <div class="card__wrapper-price"><span>{{ number_format($p->price_ru,0,","," ") }}</span>
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

<script>
  function sendRemoveForm(id) {
    document.getElementById('product_id').value = id
    document.getElementById('remove_form').submit()
  }
</script>
@include('layouts.footer')
</html>
