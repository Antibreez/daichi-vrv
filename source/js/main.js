import 'jquery-ui-bundle'
import 'inputmask/dist/jquery.inputmask'
import Swiper, {FreeMode, Navigation, Pagination} from 'swiper'

$('input.phone').inputmask('+7(999)999-99-99')

const vrfNavSwiper = new Swiper('.vrf-nav__slider', {
  modules: [FreeMode],

  freeMode: {
    enabled: true,
  },

  slidesPerView: 'auto',
  watchOverflow: true,
})

const aboutTabsSwiper = new Swiper('.vrf-about__tabs-slider', {
  modules: [FreeMode],

  freeMode: {
    enabled: true,
  },

  slidesPerView: 'auto',
  watchOverflow: true,
})

const $aboutTabs = $('.vrf-about__tabs-item')
const $aboutBlock = $('.vrf-about__tab-block')

$aboutTabs.on('click', function () {
  if ($(this).hasClass('active')) return

  const name = $(this).attr('data-block')

  $aboutBlock.hide()
  $aboutTabs.removeClass('active')

  $(this).addClass('active')
  $(`#${name}`).show()
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

const vrfTypesSwiper = new Swiper('#vrf-types-slider .swiper', {
  modules: [Pagination, Navigation],

  navigation: {
    nextEl: '#vrf-types-slider .swiper-button-next',
    prevEl: '#vrf-types-slider .swiper-button-prev',
  },

  pagination: {
    el: '#vrf-types-slider .swiper-pagination',
    type: 'bullets',
    dynamicBullets: true,
  },
})

for (let i = 0; i < $('.vrf-projects__slider-item').length; i++) {
  $('.vrf-projects__pagination').append(
    i === 0 ? '<span class="active"></span>' : '<span></span>'
  )
}

const projectsSlider = new Swiper('.vrf-projects__slider', {
  modules: [Navigation],

  navigation: {
    nextEl: '.vrf-projects .swiper-button-next',
    prevEl: '.vrf-projects .swiper-button-prev',
  },
})

projectsSlider.on('slideChange', function () {
  $('.vrf-projects__pagination span').removeClass('active')
  $('.vrf-projects__pagination span')
    .eq(projectsSlider.activeIndex)
    .addClass('active')
})
