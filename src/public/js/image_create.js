/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/image_create.js ***!
  \**************************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
var image = document.getElementById("image");
var text = document.getElementById("text");
var image_preview = document.querySelector(".image-preview");
image.addEventListener("change", updateImageDisplay);
function updateImageDisplay() {
  while (image_preview.firstChild) {
    image_preview.removeChild(image_preview.firstChild);
  }
  var curFiles = image.files;
  if (curFiles.length === 0) {
    text.style.display = 'block';
  } else {
    var _iterator = _createForOfIteratorHelper(curFiles),
      _step;
    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var file = _step.value;
        text.style.display = 'none';
        var div = document.createElement("div");
        div.className = 'preview-image-div';
        image_preview.appendChild(div);
        var para = document.createElement("p");
        para.textContent = "\u30D5\u30A1\u30A4\u30EB\u540D: ".concat(file.name);
        para.className = 'preview-image-p';
        var _image = document.createElement("img");
        _image.width = 100;
        _image.height = 100;
        _image.src = URL.createObjectURL(file);
        _image.className = 'preview-image-img';
        div.appendChild(_image);
        div.appendChild(para);
        div.appendChild(div);
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  }
}
/******/ })()
;