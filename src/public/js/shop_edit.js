/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/shop_edit.js ***!
  \***********************************/
var shop_name = document.getElementById("shop_name");
var area = document.getElementById("area");
var genre = document.getElementById("genre");
var shop_detail = document.getElementById("shop_detail");
var image_url = document.getElementById("image_url");
shop_name.addEventListener("change", function () {
  var shop_name_confirm = document.getElementById("shop_name_confirm");
  shop_name_confirm.textContent = shop_name.value;
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