/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/menus.js ***!
  \*******************************/
window.toggleNavMenu = function () {
  document.getElementById('aside-menu').classList.toggle('aside-content-hidden');
};

window.toggleTocMenu = function () {
  document.getElementById('mobile_article_contents_list').classList.toggle('toc-content-hidden');
};

window.toggleMainMenu = function (x) {
  //update the burger to be a cross
  x.classList.toggle('change'); //prevent the page from scrolling

  document.body.classList.toggle('overflow-hidden'); //toggle the menu visibility

  document.getElementById('menu_overlay').classList.toggle('menu_overlay_hidden');
};
/******/ })()
;