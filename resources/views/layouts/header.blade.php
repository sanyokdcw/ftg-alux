<div class="content">
  <div id="need-focus-block" class="form" style="overflow-y: scroll">
    <div class="form__wrapper" style="display: none">
      <div class="form__title">{{ __('index.callback') }}</div>
      <button class="form__close">
        <img src="../images/pather-close.png" alt="">
      </button>
      <form action="/callback" method="POST">
        @csrf
      <div class="form__input">
        <input name="fullname" type="text" placeholder="{{ __('index.fullname') }}*" required>
      </div>
      <div class="form__input">
        <input name="email" type="email" placeholder="{{ __('index.email') }}*" required>
      </div>
      <div class="form__input">
        <input name="phone" id="number_tel" type="tel" placeholder="{{ __('index.number') }}*" required>
      </div>
      <div class="form__input">
        <textarea id="need-focus" placeholder="{{__('index.question')}}" name="question" required></textarea> 
      </div>
      <div class="form__input">
        <input type="submit" value="{{ __('index.send') }}" >
      </div>
    </form>

    <script>
      let focusBlock = document.getElementById('need-focus-block');
      let focusInput = document.getElementById('need-focus');

      focusInput.addEventListener('focus', () => {
        focusBlock.classList.add('textarea-focus-fix');
      });

      focusInput.addEventListener('blur', () => {
        focusBlock.classList.remove('textarea-focus-fix');
      });
    </script>
    
  </div>
    <div class="form__wrapper" style="display: none">
      <div class="form__title">{{ __('index.system') }}</div>
      <button class="form__close">
        <img src="../images/pather-close.png" alt="">
      </button>

      <form>
      <div class="form__input">
        <input name="fullname" type="text" placeholder="{{ __('index.fullname') }}*" id="formName" required>
      </div>
      <div class="form__input">
        <input name="email" type="email" placeholder="{{ __('index.email') }}*" id="formEmail" required>
      </div>
      <div class="form__input">
        <input name="number" id="number_mask_h" type="tel" placeholder="{{ __('index.number') }}*" required>
      </div>
      <div class="form__input">
        <input type="submit" value="{{ __('index.send') }}" onclick="sendForm(event)">
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
            <div href="#" style="cursor: pointer" class="menu__list-link menu__list-link_active">{{ __('index.about') }}</div>
            <div class="menu__list-submenu">
              <a href="/company" class="menu__list-link">{{ __('index.about') }}</a>
              <a href="/blog" class="menu__list-link">{{ __('index.blog') }}</a>
              <a href="/projects" class="menu__list-link">{{ __('index.projects') }}</a>
              <a href="/team" class="menu__list-link">{{ __('index.team') }}</a>
            </div>
          </li>
          <li class="menu__list">
            <div href="#" style="cursor: pointer" class="menu__list-link menu__list-link_active">{{ __('index.clients') }}</div>
            <div class="menu__list-submenu">
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
      <div class="logo_adaptive">
        <a class="sidebar-adaprive__logo--img-link" href="/"><img class="sidebar-adaprive__logo--img" src="../images/logo.png" alt=""></a>
      </div>
      <div class="header__button">
        @if(Auth::check())
          <a href="/logout" style="margin:0">{{ __('index.logout') }}</a>
          <a href="/office" class="header__button-user">
            <img class="icon-images" src="../images/user-icon.png" alt="" style="">
          </a>
        @else 
          <a href="/office" class="header__button-user">
            <img class="icon-images" src="../images/user-icon.png" alt="" style="">
          </a>
        @endif
        <a href="/search" class="header__button-search">
          <img class="icon-images" src="../images/search-icon.png" alt="">
        </a>
        <a href="/cart" class="header__button-cart">
          <div class="header__button-cart_count">
            @if(Auth::check())  
            {{  \App\Models\Cart::where('user_id', Auth::user()->id)->get()->count() }}
            @else
            {{session('cart_items') ? count(session('cart_items')) : 0 }}
            @endif
          </div>
          <img class="icon-images" src="../images/icon-cart.png" alt="">
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2Q50XJEMZL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-2Q50XJEMZL');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(85137091, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true
      });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/85137091" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    
    </header>
