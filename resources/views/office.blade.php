<!DOCTYPE html>
<html lang="ru">
@section('title', 'Личный Кабинет')
@include('layouts.catalog')
@include('layouts.header')
@section('content')


<section class="url">
 
    <div class="url__text"><a href="/">{{ __('index.main')}}</a></div>
  <div style="cursor: pointer;" class="url__text" onclick="opensb()">{{__('blog-show.Catalog')}}</div>
  <div class="url__text">{{__('calc.office')}}</div>
</section>

<section class="office" style="margin-bottom: 260px;">
  <div class="office__title subtitle">{{__('calc.office')}}</div>
  <div class="office__wrapper">
    <div class="office__wrapper-item office__wrapper-item_active">
      <div class="office__wrapper-item_img">
        <svg width="40" height="30" viewBox="0 0 40 30" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M36.6667 0H3.33333C1.5 0 0 1.5 0 3.33333V26.6667C0 28.5 1.5 30 3.33333 30H36.6667C38.5 30 39.9833 28.5 39.9833 26.6667L40 3.33333C40 1.5 38.5 0 36.6667 0ZM36.666 26.6665H3.33265V3.33316H36.666V26.6665ZM35.0007 21.6664L31.684 24.9831C29.5007 23.3498 27.884 21.0164 27.134 18.3331C26.834 17.2664 26.6674 16.1498 26.6674 14.9998C26.6674 13.8498 26.834 12.7331 27.134 11.6664C27.884 8.96645 29.5007 6.64978 31.684 5.01645L35.0007 8.33311L32.484 11.6664H29.7507C29.384 12.7164 29.1674 13.8331 29.1674 14.9998C29.1674 16.1664 29.384 17.2831 29.7507 18.3331H32.484L35.0007 21.6664ZM15 15C17.75 15 20 12.75 20 10C20 7.25 17.75 5 15 5C12.25 5 10 7.25 10 10C10 12.75 12.25 15 15 15ZM16.666 9.99983C16.666 9.08316 15.916 8.33316 14.9993 8.33316C14.0826 8.33316 13.3326 9.08316 13.3326 9.99983C13.3326 10.9165 14.0826 11.6665 14.9993 11.6665C15.916 11.6665 16.666 10.9165 16.666 9.99983ZM25 22.6497C25 18.483 18.3833 16.683 15 16.683C11.6167 16.683 5 18.483 5 22.6497V24.9997H25V22.6497ZM15.0011 20C12.8345 20 10.3678 20.8333 9.13446 21.6667H20.8678C19.6178 20.8167 17.1678 20 15.0011 20Z"
            fill="#3C4D85" />
        </svg>
      </div>
      <div class="office__wrapper-item_text">{{__('calc.data')}}</div>
    </div>

    <div class="office__wrapper-item">
      <div class="office__wrapper-item_img">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M32.3 0H1.7C0.755556 0 0 0.755556 0 1.7V32.3C0 33.0556 0.755556 34 1.7 34H32.3C33.0556 34 34 33.0556 34 32.3V1.7C34 0.755556 33.0556 0 32.3 0ZM11.3326 7.55537H7.55482V11.3331H11.3326V7.55537ZM26.4452 7.55537H15.1118V11.3331H26.4452V7.55537ZM26.4452 15.1113H15.1118V18.8891H26.4452V15.1113ZM15.1118 22.6667H26.4452V26.4444H15.1118V22.6667ZM7.55482 15.1113H11.3326V18.8891H7.55482V15.1113ZM11.3326 22.6667H7.55482V26.4444H11.3326V22.6667ZM3.77852 30.2224H30.223V3.77796H3.77852V30.2224Z"
            fill="#3C4D85" />
        </svg>
      </div>
      <div class="office__wrapper-item_text">{{__('calc.history')}}</div>
    </div>

    <div class="office__wrapper-item">
      <div class="office__wrapper-item_img">
        <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M13.6003 34H28.9003C30.3113 34 31.5183 33.15 32.0283 31.926L37.1623 19.941C37.3153 19.55 37.4003 19.142 37.4003 18.7V15.3C37.4003 13.43 35.8703 11.9 34.0003 11.9H23.2733L24.8883 4.13099L24.9393 3.58699C24.9393 2.89 24.6503 2.244 24.1913 1.785L22.3893 0L11.1863 11.203C10.5743 11.815 10.2003 12.665 10.2003 13.6V30.6C10.2003 32.47 11.7303 34 13.6003 34ZM13.5998 13.6001L20.9778 6.22209L18.6998 15.3001H33.9998V18.7001L28.8998 30.6001H13.5998V13.6001ZM6.79999 13.5998H0V33.9998H6.79999V13.5998Z"
            fill="#3C4D85" />
        </svg>
      </div>
      <div class="office__wrapper-item_text">{{__('calc.special')}}</div>
    </div>
  </div>

  <div class="office__choice">
    <div class="office__order">
      <div class="office__order-title title">{{__('calc.data')}}</div>
      <form action="/office-mail" method="POST" class="office__order-form">
        <div class="office__order-form_input">
          <input name="name" type="text" placeholder="{{__('calc.first_name')}}"  value="{{ Auth::user()->name }}" required>
        </div>
        <div class="office__order-form_input">
          <input name="surname" type="text" placeholder="{{__('calc.last_name')}}" value="{{ Auth::user()->surname }}" required>
        </div>
        <div class="office__order-form_input">
          <input name="middle_name" type="text" placeholder="{{__('calc.middle_name')}}" value="{{ Auth::user()->second_name }}" required>
        </div>
        <div class="office__order-form_input">
          <input name="email" type="email" placeholder="{{__('calc.email')}}" value="{{ Auth::user()->email }}" required>
        </div>
        <div class="office__order-form_input">
          <input name="phone" type="text" placeholder="{{__('calc.number')}}" required value="{{ Auth::user()->number }}">
        </div>
      <div class="office__order-text" style="width:100%">
        {{__('calc.if')}}
      </div>
      <div class="btn-wrap" style="width:100%">
        @csrf

        <button type="submit" class="office__order-btn">{{__('calc.req')}}</button>
</form>
</div>

      <div class="office__order-password">
        <div class="office__order-title title">{{__('calc.password')}}</div>
        <form action="/password_change" method="POST">
          @csrf
          <div class="office__order-password_wrapper">
            <div class="office__order-password_input">
              <input type="password" name="password_old"  placeholder="{{__('calc.old')}}" required>
                         </div>
            <div class="office__order-password_input">
              <input type="password" name="password" placeholder="{{__('calc.new')}}" required>
            </div>
            <div class="office__order-password_input">
              <input type="password" name="password_again" placeholder="{{__('calc.confirm')}}" required>
            </div>
          </div>
        <button class="office__order-btn" type="submit">{{__('calc.password')}}</button>
      </form>
      </div>
    </div>

    <div class="office__order">
      <div class="office__order-title title">{{__('calc.my')}}</div>

      <div class="office__order-item_row office__order-item_title">
        <div class="office__order-item_head">
          {{__('calc.order_number')}}
        </div>
        <div class="office__order-item_head">
          {{__('calc.amount')}}
        </div>
        <div class="office__order-item_head">
          {{__('calc.status')}}
        </div>
        <div class="office__order-item_head">
          {{__('calc.date')}}
        </div>
      </div>

      <div class="office__order-item_bottom">
        @foreach ($orders as $order)

        <div class="office__order-item_row">
          <div class="office__order-item_top">
            <div class="office__order-item_tbody">
              {{__('calc.order')}} № {{ $order->id }}
            </div>
            <div class="office__order-item_tbody">
              {{number_format($order->sum,0,","," ")}}
            </div>
            <div class="office__order-item_tbody">
              {{ $order->status }}
            </div>
            <div class="office__order-item_tbody">
              {{ date('d-m-Y', strtotime($order->created_at)) }}
            </div>
          </div>
          <div class="office__order-item_row_bottom">
            @foreach(App\Models\OrderProduct::where('order_id', $order->id)->get() as $product)

            <div class="office__order-item_order">
              <div class="office__order-item_name">
                <a href="/product/{{$product->slug}}">
                  {{ \App\Models\Product::find($product->product_id)->name }} @if($product->quantity > 1)
                       - {{ $product->quantity }} ШТ
                  @endif
                </a>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        @endforeach


      </div>
    </div>
    @php
      if (session('currency') == null){
        session(['currency' => 'KZT']);
      }
      $currency = session('currency');
    @endphp
    <div class="office__order">
      <div class="popular__title">{{__('calc.for_u')}}</div>
      <div class="popular__wrapper">
        @foreach ($popular as $p)
          <div class="card__wrapper-item">
            <div class="card__wrapper-img" style="background-image: url(/storage/{{ $p->image }});"></div>
            <div class="card__wrapper-text">
              {{ $p->name }}
            </div>
            <div class="card__wrapper-price"><span>
              @if ($currency == 'KZT')
                {{ number_format($p->price_kz) }}
                </span> {{ __('card.tg') }}</div>
              @endif
              @if ($currency == 'USD')
                {{ number_format($p->price_uah) }}
                </span> {{ __('card.dol') }}</div>
              @endif
              @if ($currency == 'RUB')
                {{ number_format($p->price_ru) }}
                </span> {{ __('card.rub') }}</div>
              @endif
            <a href="/product/{{ $p->slug }}" class="card__wrapper-btn">{{__('index.more')}}</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  @if (session('password'))


Swal.fire(
  'Пароли не совпадают, либо пароль введен неверно',
  '',
  'error'
)


@endif
</script>
@include('layouts.footer')
</html>
