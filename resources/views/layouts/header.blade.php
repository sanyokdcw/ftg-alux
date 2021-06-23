<div class="content">
  <div class="form">
    <div class="form__wrapper" style="display: none">
      <div class="form__title">{{ __('index.callback') }}</div>
      <button class="form__close">
        <img src="../images/pather-close.png" alt="">
      </button>
      <form action="/request" method="POST">
        @csrf
      <div class="form__input">
        <input type="text" placeholder="{{ __('index.fullname') }}*" required>
      </div>
      <div class="form__input">
        <input type="text" placeholder="{{ __('index.email') }}*" required>
      </div>
      <div class="form__input">
        <input id="number_tel" type="tel" placeholder="{{ __('index.number') }}*" required>
      </div>
      <div class="form__input">
        <textarea required>{{ __('index.question') }}</textarea> 
      </div>
      <div class="form__input">
        <input type="submit" value="{{ __('index.send') }}" >
      </div>
    </form>
    </div>
    <div class="form__wrapper" style="display: none">
      <div class="form__title">{{ __('index.system') }}</div>
      <button class="form__close">
        <img src="../images/pather-close.png" alt="">
      </button>
      <form action="/request" method="POST">
        @csrf
      <div class="form__input">
        <input type="text" placeholder="{{ __('index.fullname') }}*" required>
      </div>
      <div class="form__input">
        <input type="tel" placeholder="{{ __('index.email') }}*" required>
      </div>
      <div class="form__input">
        <input id="number_mask_h" type="tel" placeholder="{{ __('index.number') }}*" required>
      </div>
      <div class="form__input">
        <input type="submit" value="{{ __('index.send') }}">
      </div>
      </form>
    </div>
  </div>




    <header class="header">
      <nav class="menu">
        <div class="header__fixed-close">
          <div class="header__fixed-close_item"></div>
          <div class="header__fixed-close_item"></div>
        </div>
        <ul class="menu__ul">
          <li class="menu__list">
            <a href="/company" class="menu__list-link menu__list-link_active">{{ __('index.about') }}</a>
            <div class="menu__list-submenu">
              <a href="/company" class="menu__list-link">{{ __('index.about') }}</a>
              <a href="/blog" class="menu__list-link">{{ __('index.blog') }}</a>
              <a href="/projects" class="menu__list-link">{{ __('index.projects') }}</a>
              <a href="/team" class="menu__list-link">{{ __('index.team') }}</a>
              <a href="/delivery" class="menu__list-link">{{ __('index.del') }}</a>
              <a href="/guarange" class="menu__list-link">{{ __('index.warranty') }}</a>
            </div>
          </li>
          <li class="menu__list">
            <a href="/company" class="menu__list-link menu__list-link_active">{{ __('index.clients') }}</a>
            <div class="menu__list-submenu">
              <a href="/company" class="menu__list-link">{{ __('index.about') }}</a>
              <a href="/blog" class="menu__list-link">{{ __('index.blog') }}</a>
              <a href="/projects" class="menu__list-link">{{ __('index.projects') }}</a>
              <a href="/team" class="menu__list-link">{{ __('index.team') }}</a>
              <a href="/delivery" class="menu__list-link">{{ __('index.del') }}</a>
              <a href="/guarange" class="menu__list-link">{{ __('index.warranty') }}</a>

            </div>
          </li>
          <li class="menu__list mobile">
            <a href="/blog" class="menu__list-link">{{ __('index.blog') }}</a>
          </li>
          <li class="menu__list mobile">
            <a href="/projects" class="menu__list-link">{{ __('index.projects') }}</a>
          </li>
          <li class="menu__list mobile">
            <a href="/team" class="menu__list-link">{{ __('index.team') }}</a>
          </li>
          <li class="menu__list mobile">
            <a href="/delivery" class="menu__list-link">{{ __('index.del') }}</a>
          </li>
          <li class="menu__list mobile">
            <a href="/guarange" class="menu__list-link">{{ __('index.warranty') }}</a>
          </li>
          <li class="menu__list">
            <a href="/partner" class="menu__list-link">{{ __('index.partners') }}</a>
          </li>
          <li class="menu__list">
            <a href="/contact" class="menu__list-link">{{ __('index.contacts') }}</a>
          </li>
        </ul>
      </nav>
      <div class="header__button">
        @if(Auth::check())
          <a href="/logout" style="margin:0">{{ __('index.logout') }}</a>
          <a href="/office" class="header__button-user">
            <img src="../images/user-icon.png" alt="" style="">
          </a>
        @else 
          <a href="/office" class="header__button-user">
            <img src="../images/user-icon.png" alt="" style="">
          </a>
        @endif
        <a href="/search" class="header__button-search">
          <img src="../images/search-icon.png" alt="">
        </a>
        <a href="/cart" class="header__button-cart">
          <div class="header__button-cart_count">
            @if(Auth::check())  
            {{  \App\Models\Cart::where('user_id', Auth::user()->id)->get()->count() }}
            @else
            0
            @endif
          </div>
          <img src="../images/icon-cart.png" alt="">
        </a>
        <a href="#" class="header__button-search bar">
          <img src="../images/menu.png" alt="" style="height: 19px; width: 18px">
        </a>
        {{-- <button href="#" class="bar">
          <img src="/images/menu.png" alt="" class="bar_img">
        </button> --}}
      </div>

      <script src="https://unpkg.com/imask"></script>
    <script>
        var registerPhoneNumHeader = document.getElementById('number_tel');

        var maskPhoneOptionsHeader = {
            mask: '+{7}(000)000-00-00'
            };
        var mask = IMask(registerPhoneNumHeader, maskPhoneOptionsHeader);

        var registerPhoneNumHeaderH = document.getElementById('number_mask_h');

        var maskPhoneOptionsHeaderH = {
          mask: '+{7}(000)000-00-00'
        };
        var mask = IMask(registerPhoneNumHeaderH, maskPhoneOptionsHeaderH);
    </script>
    
    </header>
