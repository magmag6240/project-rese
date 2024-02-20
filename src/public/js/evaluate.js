/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/evaluate.js ***!
  \**********************************/
var stars = document.getElementsByClassName("star");
var clicked = false;
document.addEventListener("DOMContentLoaded", function () {
  var _loop = function _loop(i) {
    stars[i].addEventListener("mouseover", function () {
      if (!clicked) {
        for (var j = 0; j <= i; j++) {
          stars[j].style.color = "#4169E1";
        }
      }
    }, false);
    stars[i].addEventListener("mouseout", function () {
      if (!clicked) {
        for (var j = 0; j < stars.length; j++) {
          stars[j].style.color = "#a09a9a";
        }
      }
    }, false);
    stars[i].addEventListener("click", function () {
      clicked = true;
      for (var j = 0; j <= i; j++) {
        stars[j].style.color = "#4169E1";
      }
      for (var _j = i + 1; _j < stars.length; _j++) {
        stars[_j].style.color = "#a09a9a";
      }
    }, false);
  };
  for (var i = 0; i < stars.length; i++) {
    _loop(i);
  }
});
var length = document.getElementById("input_length");
document.addEventListener("DOMContentLoaded", function () {
  function ShowLength(str) {
    document.getElementById("input_length").innerHTML = str.length + "文字";
  }
});
/******/ })()
;