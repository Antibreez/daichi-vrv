import 'jquery-ui-bundle'
import 'inputmask/dist/jquery.inputmask'
import Swiper, {FreeMode, Navigation, Pagination} from 'swiper'
import Hammer from 'hammerjs'

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

    isNameValid = false
    isPhoneValid = false
    isEmailValid = false

    hasNameError = false
    hasPhoneError = false
    hasEmailError = false
  } else {
    $btn.attr('disabled', true)
  }
}

$name.on('input', onNameInput)

$email.on('input', onEmailInput)
$phone.on('input', onPhoneInput)
$btn.on('click', onSubmit)

const $slide = $('.vrf-about__slide')
const $preview = $('.vrf-about__preview')
const $img = $preview.find('img')
const $close = $preview.find('button')

let scale = 1
let x = 0
let y = 0

if ($preview.length > 0) {
  $('head').append(
    `<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">`
  )

  const mc = new Hammer.Manager($preview[0])
  const pinch = new Hammer.Pinch()
  const pan = new Hammer.Pan()

  pinch.recognizeWith(pan)

  mc.add([pinch, pan])

  mc.on('pinch pan', function (e) {
    const delta = e.scale - 1
    let dX = e.deltaX
    let dY = e.deltaY

    // console.log(
    //   'right',
    //   $img.offset().left + $img.outerWidth() - $(window).outerWidth() + e.deltaX
    // )
    // console.log('left', $img.offset().left + e.deltaX)

    // if (
    //   $img.offset().left + e.deltaX > 0 ||
    //   $img.offset().left +
    //     $img.outerWidth() -
    //     $(window).outerWidth() +
    //     e.deltaX <
    //     0
    // ) {
    //   dX = 0
    // }

    // console.log(dX)
    // scale += delta
    // scale = scale >= 1 ? scale : 1
    $img.css(
      'transform',
      `translate(${x + dX}px, ${y + dY}px)
      scale(${scale + delta >= 1 ? scale + delta : 1})`
    )
  })

  mc.on('panend', function (e) {
    x += e.deltaX
    y += e.deltaY
  })

  mc.on('pinchend', function (e) {
    scale += e.scale - 1
    scale = scale >= 1 ? scale : 1
  })
}

$slide.on('click', function () {
  if ($(window).outerWidth() > 767) return
  const src = $(this).find('img').attr('src')

  $img.attr('src', src)
  $preview.addClass('opened')
  $('body').addClass('no-scroll')
})

$close.on('click', function () {
  $preview.removeClass('opened')
  $('body').removeClass('no-scroll')

  scale = 1
  x = 0
  y = 0
  $img.css('transform', `translate(0, 0) scale(1)`)
})

$preview.on('click', function () {
  $preview.removeClass('opened')
  $('body').removeClass('no-scroll')

  scale = 1
  x = 0
  y = 0
  $img.css('transform', `translate(0, 0) scale(1)`)
})

$(window).on('resize', function () {
  if ($(this).outerWidth() > 767) {
    $('body').removeClass('no-scroll')
  }
})

const $closeBtn = $('.action-modal__close')
const $inner = $('.action-modal__inner')
const $closeBtnBottom = $('.action-modal__close-bottom')

$closeBtn.on('click', function () {
  $(this).parents('.action-modal').removeClass('opened')
  $('body').removeClass('no-scroll')
})

$closeBtnBottom.on('click', function () {
  $(this).parents('.action-modal').removeClass('opened')
  $('body').removeClass('no-scroll')
})

$inner.on('click', function (e) {
  if ($(e.target).parents('.action-modal__body').length === 0) {
    $(this).parents('.action-modal').removeClass('opened')
    $('body').removeClass('no-scroll')
  }
})
