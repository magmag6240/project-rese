/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/count.js ***!
  \*******************************/
function wordCount(val) {
  return {
    charactersNoSpaces: val.replace(/\s+/g, '').length,
    characters: val.length,
    lines: val.split(/\r*\n/).length
  };
}
var textarea = document.getElementById('comments');
var charCounting = document.getElementById('charCounting');
textarea.addEventListener('keyup', function () {
  console.log(textarea.value);
  var wc = wordCount(textarea.value);
  charCounting.innerText = wc.charactersNoSpaces;
});
/******/ })()
;