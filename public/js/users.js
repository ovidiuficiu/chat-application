/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/users.js ***!
  \*******************************/
var searchBar = document.querySelector(".search input"),
    searchIcon = document.querySelector(".search button"),
    usersList = document.querySelector(".users-list");

searchIcon.onclick = function () {
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();

  if (searchBar.classList.contains("active")) {
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
};

searchBar.onkeyup = function () {
  var searchTerm = searchBar.value;

  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }

  fetch("/list-users?search=" + searchTerm).then(function (response) {
    return response.text();
  }).then(function (data) {
    usersList.innerHTML = data;
  });
};

setInterval(function () {
  fetch("/list-users").then(function (response) {
    return response.text();
  }).then(function (data) {
    if (!searchBar.classList.contains("active")) {
      usersList.innerHTML = data;
    }
  });
}, 500);
/******/ })()
;