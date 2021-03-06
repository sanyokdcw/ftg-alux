<footer class="footer">
    <div class="footer__top">
      <div class="footer__wrapper">
        <div class="footer__wrapper-item" style="width: 30%; ">
          <div class="footer__wrapper-logo">
            <img class="logotype" src="../images/logo.png" alt="">
          </div>
          <div class="footer__wrapper-text footer__exchange">
           {{-- {{ setting('index.footer_description') }} --}}
           <p>{{ __('index.exchangeRates')}}</p>
           <div>TG: 429,66</div>
           <div>USD: {{$usd}}</div>
           <div>RUB: {{$rub}}</div>
          </div>
        </div>
        <div class="footer__wrapper-item">
          <div class="footer__wrapper-title">{{ __('index.companyAbout') }}</div>
          <div class="footer__wrapper-block">
            <a href="/company" class="footer__wrapper-link">{{ __('index.companyAbout') }}</a>
            <a href="/blog" class="footer__wrapper-link">{{ __('index.blog') }}</a>
            <a href="/projects" class="footer__wrapper-link">{{ __('index.projects') }}</a>
            <a href="/team" class="footer__wrapper-link">{{ __('index.team') }}</a>
          </div>
        </div>
        <div class="footer__wrapper-item">
          <div class="footer__wrapper-title">{{ __('index.clients') }}</div>
          <div class="footer__wrapper-block">
            <a href="/guarange" class="footer__wrapper-link">{{ __('index.warranty') }}</a>
            {{-- <a href="#" class="footer__wrapper-link">Калькулятор объема</a> --}}
{{--            <a href="/subcategory/3" class="footer__wrapper-link">КАТАЛОГ</a>--}}
{{--            <a href="/calc" class="footer__wrapper-link">Калькулятор объема</a>--}}
          </div>
        </div>
        <div class="footer__wrapper-item" style="width: 30%">
          <div class="footer__wrapper-title">{{ __('index.contacts') }}</div>
          <div class="footer__wrapper-block">
            <div href="#" class="footer__wrapper-link">
              <img src="../images/map-icon.png" alt=""> {{  strip_tags(setting('contacts.address')) }}
            </div>
            <a href="tel:{{setting('contacts.telephone')}}" class="footer__wrapper-link footer__wrapper-phone">
              <img src="../images/phone-3.png" alt=""> {{ setting('contacts.telephone') }}</a>

            <a href="tel:{{setting('contacts.footer-phone')}}" class="footer__wrapper-link footer__wrapper-phone" style="padding-left: 0 !important; margin-left: 30px;" >
              {{ setting('contacts.footer-phone') }}
            </a>
            
            <a href="tel:+77082150492" class="footer__wrapper-link footer__wrapper-phone" style="padding-left: 0 !important;" >
              <img src="../images/phone-3.png" alt="">
              +7 708 215 04 92
            </a>
            <a href="mailto:{{ setting('contacts.email') }}" class="footer__wrapper-link">

              <img src="../images/mail-icon.png" alt="">
              {{ setting('contacts.email') }}
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer__bottom-text">{{ __('index.safetyFTG') }}</div>
      <a href="/conf.pdf" target="_blank" class="footer__bottom-link">{{ __('index.privacy')}}</a>
    </div>
  </footer>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(".slider-banner").slick({
            // dots:false,
            adaptiveHeight: true,
            // prevArrow: false,
            //  nextArrow: false,
            slidesToShow:4,
            responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                    }
                    },
                    {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    } 
            ]
        })
    </script>

<script src="https://unpkg.com/imask"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('contact'))
<script>

Swal.fire(
  'Ваша заявка принята',
  'Мы вам перезвоним',
  'success'
)
</script>
@endif

<script src="../js/main.min.js"></script>
</body>
