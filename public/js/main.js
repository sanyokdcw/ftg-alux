window.addEventListener("load", () => {
    const swiperSertificate = new Swiper(".sertificate__wrapper", {
        spaceBetween: 60,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            1550: {
                slidesPerView: 4,
            },
            760: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            }
        }
    });

    const projectMySwiper = document.querySelectorAll('.project .mySwiper'),
        projectMySwiper2 = document.querySelectorAll('.project .mySwiper2');

    if (projectMySwiper && projectMySwiper2) {
        for (let i = 0; i < projectMySwiper.length; i++) {
            const projectThumbs = new Swiper(projectMySwiper[i], {
                breakpoints: {
                    500: {
                        slidesPerView: 4,
                    },
                    320: {
                        slidesPerView: 3,
                    },
                },
            });

            const projectTop = new Swiper(projectMySwiper2[i], {
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: projectThumbs,
                },
            });
        }

    }

    const swiperSystem = new Swiper(".system__wrapper", {
        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            1400: {
                slidesPerView: 4,
            },
            900: {
                slidesPerView: 3,
            },
            600: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            }
        }
    });

    //=======================Sitebar open=====================//
    const sitebarItem = document.querySelectorAll('.sitebar__drowdown-item_active .sitebar__drowdown-btn');

    if (sitebarItem) {
        sitebarItem.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                btn.parentNode.classList.toggle('sitebar__drowdown-item_open')
            });
        })
    }

    //=======================Project text open=====================//
    const projectRed = document.querySelectorAll('.project__wrapper-red');

    projectRed.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.parentNode.classList.add('project__wrapper-open')
        });
    });

    //=======================maks phone open=====================//
    const inputPhone = document.querySelectorAll('input[name="phone"]');

    inputPhone.forEach(phone => {
        IMask(phone, {
            mask: '+{7} (000) 000-00-00',
            lazy: false
        });
    });

    //=======================Tabs office open=====================//
    const officeItem = document.querySelectorAll('.office__wrapper-item'),
        officeOrder = document.querySelectorAll('.office__order');

    function hiddenOrder() {
        officeOrder.forEach(el => el.style.display = 'none');
        officeItem.forEach(el => el.classList.remove('office__wrapper-item_active'));
    }

    officeItem.forEach((btn, idx) => {
        btn.addEventListener('click', () => {
            hiddenOrder()
            officeOrder[idx].style.display = 'block';
            officeItem[idx].classList.add("office__wrapper-item_active");
        })
    });

    //=======================History order open=====================//
    const officeTopOrder = document.querySelectorAll('.office__order-item_top');

    officeTopOrder.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.parentNode.classList.toggle('office__order-item_row_open')
        });
    })

    //=======================Filer open=====================//
    const sitebarBtn = document.querySelector('.sitebar__drowdown-title'),
        body = document.querySelector('body'),
        closeSitebarBtn = document.querySelector('.sitebar__fixed-close');

    if (sitebarBtn && closeSitebarBtn) {
        window.addEventListener('resize', () => {
            openSiteBar()
        })

        function openSiteBar() {
            if (window.innerWidth <= 1250) {
                sitebarBtn.addEventListener('click', () => {
                    body.classList.add('sitebar-open')
                });
            } else {
                body.classList.remove('sitebar-open')
            }
        }
        openSiteBar()

        closeSitebarBtn.addEventListener('click', () => {
            body.classList.remove('sitebar-open')
        })

    }
    //=======================mobile-menu open=====================//
    const bar = document.querySelector('.bar'),
        closeMenu = document.querySelector('.header__fixed-close');

    if (bar && closeMenu) {
        bar.addEventListener('click', () => {
            body.classList.add('header-mobile')
        });

        closeMenu.addEventListener('click', () => {
            body.classList.remove('header-mobile')
        });
    }
});

const btnContact = document.querySelector('.btn-contact'),
    btnFill = document.querySelector('.btn-fill'),
    main = document.querySelector('body'),
    formClose = document.querySelectorAll('.form__close'),
    formWrapper = document.querySelectorAll('.form__wrapper');

if (btnContact && formClose) btnContact.addEventListener('click', () => openModelRight());
if (btnFill && formClose) btnFill.addEventListener('click', () => openModelRight());
if (formClose) formClose.forEach(el => { el.addEventListener('click', () => closeModelRight()) })

function openModelRight() {
    main.classList.add('open-form')
    if (btnContact) formWrapper[0].style.display = 'block';
    else formWrapper[1].style.display = 'block';
}

function closeModelRight() {
    console.log(1)
    main.classList.remove('open-form');
    formWrapper.forEach(el => { el.style.display = 'none' })
}