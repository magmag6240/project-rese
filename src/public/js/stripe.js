/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/stripe.js ***!
  \********************************/
$(function () {
  $('[data-toggle="popover"]').popover();
  $('#cvc').on('click', function () {
    if ($('.cvc-preview-container').hasClass('hide')) {
      $('.cvc-preview-container').removeClass('hide');
    } else {
      $('.cvc-preview-container').addClass('hide');
    }
  });
  $('.cvc-preview-container').on('click', function () {
    $(this).addClass('hide');
  });
});
/******/ })()
;