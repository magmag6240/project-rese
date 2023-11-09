/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/shop_menu_edit.js ***!
  \****************************************/
var shop_name = document.getElementById("menu_name");
var shop_detail = document.getElementById("menu_detail");
var image_url = document.getElementById("price");
shop_name.addEventListener("change", function () {
  var menu_name_confirm = document.getElementById("menu_name_confirm");
  menu_name_confirm.textContent = menu_name.value;
});
shop_detail.addEventListener("change", function () {
  var menu_detail_confirm = document.getElementById("menu_detail_confirm");
  menu_detail_confirm.textContent = menu_detail.value;
});
price.addEventListener("change", function () {
  var price_confirm = document.getElementById("price_confirm");
  price_confirm.textContent = price.value;
});
/******/ })()
;