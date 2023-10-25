/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/menu.js ***!
  \******************************/
var menuButton = document.querySelector('.menu-button');
var menuNav = document.querySelector('.menu-nav');
var menuClose = document.querySelector('.menu-close');
var menuOpen = document.querySelector('.menu-open');
menuButton.addEventListener('click', function () {
  menuNav.classList.toggle('active');
  menuClose.classList.toggle('active');
  menuOpen.classList.toggle('active');
});
/******/ })()
;