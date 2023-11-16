/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/tab.js ***!
  \*****************************/
document.addEventListener("DOMContentLoaded", function () {
  var tabs = document.getElementsByClassName("js-tab");
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", tabSwitch);
  }
  function tabSwitch() {
    var ancestorEle = this.closest(".js-tab-panel");
    var active_tab_classes = "active_tab";
    var inactive_tab_classes = "inactive_tab";
    if (ancestorEle.getElementsByClassName(active_tab_classes)[0]) {
      ancestorEle.getElementsByClassName(active_tab_classes)[0].classList.add(inactive_tab_classes);
      ancestorEle.getElementsByClassName(active_tab_classes)[0].classList.remove(active_tab_classes);
      this.classList.add(active_tab_classes);
      this.classList.remove(inactive_tab_classes);
    }
    var active_content_classes = "active_content";
    var inactive_content_classes = "inactive_content";
    var targetEle = ancestorEle.getElementsByClassName("js-panel " + active_content_classes)[0];
    targetEle.classList.remove(active_content_classes);
    targetEle.classList.add(inactive_content_classes);
    var groupTabs = ancestorEle.getElementsByClassName("js-tab");
    var arrayTabs = Array.prototype.slice.call(groupTabs);
    var index = arrayTabs.indexOf(this);
    var targetPanel = ancestorEle.getElementsByClassName("js-panel")[index];
    targetPanel.classList.add(active_content_classes);
    targetPanel.classList.remove(inactive_content_classes);
  }
});
/******/ })()
;