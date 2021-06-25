<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#112468">
    <meta name="theme-color" content="#112468">
    <title>FTG</title>
    <link rel="stylesheet" href="../css/style.min.css" />
</head>

<body>
    <div class="modal-wrapper form__close" id="modal-wrapper">
    </div>

    <div class="main">
        <button class="chat" onclick="openModelRight('contact2')">
            <img src="../images/chat.png" alt="">
        </button>
        <div class="container">
            <section class="sitebar">
                <a href="/" class="sitebar__logo">
                    <img src="../images/logo.png" alt="">
                </a>
                <div class="sitebar__wrapper">
                    <div class="sitebar__wrapper-left">
                        <div class="sitebar__wrapper-item">
                            <div class="sitebar__wrapper-item_left">
                                <img src="../images/language-icon.png" alt="">
                            </div>
                            <div class="sitebar__wrapper-item_right dropdown" style="display:flex">
                                <span style="text-transform: uppercase">
                                    {{ session('locale') }}
                                </span>
                                <div class="arrow" style="display: flex; align-items:center; margin-left: 5px; ">
                                    <img src="/images/arrow-bottom.png" alt="" style="width: 8px">
                                </div>
                                <div class="dropdown-content" style="min-width: 0; z-index:1000">
                                    @foreach (['ru', 'kz', 'en'] as $locale)
                                        @if ($locale != session('locale'))
                                            <p style="font-size: 15px; text-transform:uppercase">
                                                <a href="/setlocale/{{ $locale }}">
                                                    {{ $locale }}
                                                </a>
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="sitebar__wrapper-item">
                            <a href="tel:{{ setting('contacts.telephone') }}">
                                <img src="../images/phone-1.png" alt="">
                                <div class="sitebar__wrapper-item_right">
                                    <a href="tel:{{ setting('contacts.telephone') }}" style="font-size:13px">
                                        {{ setting('contacts.telephone') }}
                                    </a>
                                </div>
                            </a>
                        </div>

                        <div class="sitebar__wrapper-item sitebar__wrapper-times">
                            <a href="#">
                                <img src="../images/time-icon.png" alt="">
                                <div class="sitebar__wrapper-item_right" style="font-size:12px">
                                    <div>
                                        {{ setting('contacts.schedule') }}
                                    </div>
                                    <div>
                                        {{ setting('contacts.schedule1') }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="sitebar__wrapper-right arrow">
                        <div class="sitebar__wrapper-item">
                            <div class="sitebar__wrapper-item_left">
                                <img src="../images/card-icon.png" alt="">
                            </div>
                            <div class="sitebar__wrapper-item_right dropdown" style="display:flex">
                                @php
                                    if (session('currency') == null) {
                                        session(['currency' => 'KZT']);
                                    }
                                    $currency = session('currency');
                                @endphp
                                <span>
                                    {{ $currency }}
                                </span>
                                <div class="arrow" style="display: flex; align-items:center; margin-left: 5px">
                                    <img src="/images/arrow-bottom.png" alt="" style="width: 8px">
                                </div>
                                <div class="dropdown-content" style="min-width: 0">
                                    @if ($currency != 'UAH')
                                        <p style="font-size: 14px;">
                                            <a href="/currency/UAH">
                                                UAH
                                            </a>
                                        </p>
                                    @endif
                                    @if ($currency != 'RUB')
                                        <p style="font-size: 14px;">
                                            <a href="/currency/RUB">
                                                RUB
                                            </a>
                                        </p>
                                    @endif
                                    @if ($currency != 'KZT')
                                        <p style="font-size: 14px;">
                                            <a href="/currency/KZT">
                                                KZT
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="sitebar__wrapper-item sitebar__wrapper-ball">
                            <a href="tel:{{ setting('contacts.telephone') }}">
                                <img src="../images/phone-2.png" alt="">
                                <div class="sitebar__wrapper-item_right" style="">
                                    {{ __('index.call') }}
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <a href="/product" class="sitebar__btn">{{ __('index.products') }}</a>
                <div class="sitebar__drowdown-title">
                    <img src="../images/product-icon.png" alt=""> <span>{{ __('index.catalog') }}</span>
                </div>
                <div class="sitebar__fixed">
                    <div class="sitebar__fixed-close">
                        <div class="sitebar__fixed-close_item"></div>
                        <div class="sitebar__fixed-close_item"></div>
                    </div>
                    <ul class="sitebar__drowdown">

                        @foreach ($categories as $category)
                        @if ($category->subcategories->count() == 0)
                            <li class="sitebar__drowdown-item sitebar__drowdown-item">
                        @else
                            <li class="sitebar__drowdown-item sitebar__drowdown-item_active">
                        @endif
                                @if ($category->subcategories->count() == 0)

                                    <div class="sitebar__drowdown-btn"
                                        onclick="window.location.href='/category/{{ $category->id }}'">

                                        {!! $category->name !!}</div>
                                @else
                                    <div class="sitebar__drowdown-btn">{!! $category->name !!}</div>
                                @endif
                                <div class="sitebar__drowdown-item_block">
                                    @foreach ($category->subcategories as $subcategory)
                                        <a href="/subcategory/{{ $subcategory->id }}"
                                            class="sitebar__drowdown-item_btn">
                                            <span>{{ $subcategory->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach

                    </ul>

                    <a href="#" class="sitebar__link btn-contact2"
                        onclick="openModelRight('contact2')">{{ __('index.write_us') }}</a>
                    <div class="sitebar__social">
                        @foreach ($socials as $social)
                            <a href="{{ $social->link }}" class="sitebar__social-link">
                                <img src="/storage/{{ $social->image }}" alt="">
                            </a>
                        @endforeach

                    </div>
                    <div class="sitebar__text">© FTGCompany. All Rights Reserved</div>
                </div>
            </section>
