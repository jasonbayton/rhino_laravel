/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/darkmodetoggle.js ***!
  \****************************************/
var toggle = document.getElementById("darktoggle");

toggle.onclick = function () {
  var currentTheme = document.documentElement.getAttribute("data-theme");
  var targetTheme = "light";

  if (currentTheme === "light") {
    targetTheme = "dark";
  }

  document.documentElement.setAttribute('data-theme', targetTheme);
  localStorage.setItem('theme', targetTheme);
};
/******/ })()
;