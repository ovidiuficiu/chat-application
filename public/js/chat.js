/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/chat.js ***!
  \******************************/
var form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = function (e) {
  e.preventDefault();
};

inputField.focus();

inputField.onkeyup = function () {
  if (inputField.value != "") {
    sendBtn.classList.add("active");
  } else {
    sendBtn.classList.remove("active");
  }
};

sendBtn.onclick = function () {
  fetch(form.dataset['outgoing'], {
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    method: 'POST',
    body: new FormData(form)
  }).then(function () {
    inputField.value = "";
    scrollToBottom();
  });
};

chatBox.onmouseenter = function () {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = function () {
  chatBox.classList.remove("active");
};

setInterval(function () {
  fetch(form.dataset['incoming']).then(function (response) {
    return response.text();
  }).then(function (data) {
    chatBox.innerHTML = data;

    if (!chatBox.classList.contains("active")) {
      scrollToBottom();
    }
  });
}, 500);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
/******/ })()
;