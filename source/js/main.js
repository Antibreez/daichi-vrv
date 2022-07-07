import 'jquery-ui-bundle'
import 'inputmask/dist/jquery.inputmask'
import Swiper, {FreeMode, Navigation, Pagination} from 'swiper'

const vrfNavSwiper = new Swiper('.vrf-nav__slider', {
  modules: [FreeMode],

  freeMode: {
    enabled: true,
  },

  slidesPerView: 'auto',
  watchOverflow: true,
})

const howWorkSlider = new Swiper('#how-work-slider .swiper', {
  modules: [Pagination, Navigation],

  navigation: {
    nextEl: '#how-work-slider .swiper-button-next',
    prevEl: '#how-work-slider .swiper-button-prev',
  },

  pagination: {
    el: '#how-work-slider .swiper-pagination',
    type: 'bullets',
    dynamicBullets: true,
  },
})
