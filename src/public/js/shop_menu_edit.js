/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/shop_menu_edit.js ***!
  \****************************************/
var select_menu = document.getElementById("select_menu");
var name_before = document.getElementById("name_before");
var price_before = document.getElementById("price_before");
var menu_detail_before = document.getElementById("menu_detail_before");
var name_after = document.getElementById("name_after");
var price_after = document.getElementById("price_after");
var menu_detail_after = document.getElementById("menu_detail_after");
select_menu.addEventListener("change", function () {
  var name_before = document.getElementById("name_before");
  name_before.textContent = shop_name.value;
});
area.addEventListener("change", function () {
  var area_confirm = document.getElementById("area_confirm");
  area_confirm.textContent = area.options[area.selectedIndex].textContent;
});
genre.addEventListener("change", function () {
  var genre_confirm = document.getElementById("genre_confirm");
  genre_confirm.textContent = genre.options[genre.selectedIndex].textContent;
});
shop_detail.addEventListener("change", function () {
  var shop_detail_confirm = document.getElementById("shop_detail_confirm");
  shop_detail_confirm.textContent = shop_detail.value;
});
image_url.addEventListener("change", function () {
  var image_url_confirm = document.getElementById("image_url_confirm");
  image_url_confirm.textContent = image_url.value;
});
/******/ })()
;