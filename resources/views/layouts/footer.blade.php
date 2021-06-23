<footer class="footer">
    <div class="footer__top">
      <div class="footer__wrapper">
        <div class="footer__wrapper-item">
          <div class="footer__wrapper-logo">
            <img src="../images/logo.png" alt="">
          </div>
          <div class="footer__wrapper-text">
            {{ setting('index.footer_description') }}
          </div>
        </div>
        <div class="footer__wrapper-item">
          <div class="footer__wrapper-title">О компании</div>
          <div class="footer__wrapper-block">
            <a href="/company" class="footer__wrapper-link">О компании</a>
            <a href="/blog" class="footer__wrapper-link">Блог</a>
            <a href="/projects" class="footer__wrapper-link">Наши проекты</a>
            <a href="/team" class="footer__wrapper-link">Команда</a>

          </div>
        </div>
        <div class="footer__wrapper-item">
          <div class="footer__wrapper-title">Клиентам</div>
          <div class="footer__wrapper-block">
            <a href="/guarange" class="footer__wrapper-link">Гарантия и сервис</a>
            {{-- <a href="#" class="footer__wrapper-link">Калькулятор объема</a> --}}
            <a href="/subcategory/3" class="footer__wrapper-link">КАТАЛОГ</a>
            <a href="/calc" class="footer__wrapper-link">Калькулятор объема</a>
          </div>
        </div>
        <div class="footer__wrapper-item" style="width: 20%">
          <div class="footer__wrapper-title">Контакты</div>
          <div class="footer__wrapper-block">
            <div href="#" class="footer__wrapper-link">
              <img src="../images/map-icon.png" alt=""> {{  strip_tags(setting('contacts.address')) }}
            </div>
            <a href="tel:+7987654321" class="footer__wrapper-link footer__wrapper-phone">
              <img src="../images/phone-3.png" alt=""> {{ setting('contacts.telephone') }}</a>
            <a href="tel:+7987654321" class="footer__wrapper-link footer__wrapper-phone"></a>
            <a href="mailto:Info@ftgcompany.kz" class="footer__wrapper-link">
              <img src="../images/mail-icon.png" alt="">
              {{ setting('contacts.email') }}
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer__bottom-text">© ТОО “FTG Company”, 2017 г. Все права защищены.</div>
      <div class="alux">
        <div class="alux-text">
          Разработано в 
        </div>
        <img src="/images/alux.png" alt="">
      </div>
      <a href="#" class="footer__bottom-link">Политика конфиденциальности</a>
    </div>
  </footer>
</div>
</div>
</div>

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
