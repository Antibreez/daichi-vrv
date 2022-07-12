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

const howWorkSlider = new Swiper('#how-work-slider .vrf-about__slider', {
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

const vrfTypesSwiper = new Swiper('#vrf-types-slider .vrf-about__slider', {
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

const vrfAboutTextSlider = new Swiper('.vrf-about__tab-block-text-mobile', {
  modules: [FreeMode],

  freeMode: {
    enabled: true,
  },

  slidesPerView: 'auto',
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

  slidesPerView: 'auto',
  centeredSlides: true,
})

projectsSlider.on('slideChange', function () {
  $('.vrf-projects__pagination span').removeClass('active')
  $('.vrf-projects__pagination span')
    .eq(projectsSlider.activeIndex)
    .addClass('active')
})

const vrfAboutSlider = new Swiper('.vrf-about__list-mobile-block', {
  modules: [FreeMode],

  freeMode: {
    enabled: true,
  },

  slidesPerView: 'auto',
})

const $form = $('.vrf-select__form-wrapper form')
const $phone = $('input[name="phone"]')
const $email = $('input[name="email"]')
const $name = $('input[name="name"]')
const $btn = $('.vrf-select__form-submit')

let isNameValid = false
let isPhoneValid = false
let isEmailValid = false

let hasNameError = false
let hasPhoneError = false
let hasEmailError = false

const emailRegExp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/

const setError = $item => {
  $item.parent().addClass('error')
}

const removeError = $item => {
  $item.parent().removeClass('error')
}

const checkErrors = () => {
  if (hasNameError || hasEmailError || hasPhoneError) {
    $btn.attr('disabled', true)
  } else {
    $btn.removeAttr('disabled')
  }
}

const setErrors = () => {
  if (!isNameValid) {
    setError($name)
    hasNameError = true
  }
  if (!isEmailValid) {
    setError($email)
    hasEmailError = true
  }
  if (!isPhoneValid) {
    setError($phone)
    hasPhoneError = true
  }
}

const onNameInput = () => {
  removeError($name)
  hasNameError = false
  checkErrors()

  if ($name.val().trim().length === 0) {
    isNameValid = false
  } else {
    isNameValid = true
  }

  console.log('isNameValid', isNameValid)
}

const onEmailInput = () => {
  removeError($email)
  hasEmailError = false
  checkErrors()

  if ($email.val().trim().match(emailRegExp)) {
    isEmailValid = true
  } else {
    isEmailValid = false
  }
}

const onPhoneInput = () => {
  removeError($phone)
  hasPhoneError = false
  checkErrors()

  if ($phone.val().includes('_')) {
    isPhoneValid = false
  } else {
    isPhoneValid = true
  }
}

const onSubmit = e => {
  e.preventDefault()

  setErrors()

  if (isNameValid && isEmailValid && isPhoneValid) {
    $form.trigger('submit')
  } else {
    $btn.attr('disabled', true)
  }
}

$name.on('input', onNameInput)

$email.on('input', onEmailInput)
$phone.on('input', onPhoneInput)
$btn.on('click', onSubmit)
