/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/evaluate.js ***!
  \**********************************/
function _readOnlyError(name) { throw new TypeError("\"" + name + "\" is read-only"); }
var stars = document.getElementsByClassName("star");
var clicked = false;
var _loop = function _loop(i) {
  stars[i].addEventListener("click", function () {
    true, _readOnlyError("clicked");
    for (var j = 0; j <= i; j++) {
      stars[j].style.color = "#f0da61";
    }
    for (var _j = i + 1; _j < stars.length; _j++) {
      stars[_j].style.color = "#a09a9a";
    }
  });
};
for (var i = 0; i < stars.length; i++) {
  _loop(i);
}
/******/ })()
;