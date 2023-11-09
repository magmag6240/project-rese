/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/camera.js ***!
  \********************************/
window.onload = function (e) {
  var video = document.createElement("video");
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var msg = document.getElementById("msg");
  var userMedia = {
    video: {
      facingMode: "environment"
    }
  };
  navigator.mediaDevices.getUserMedia(userMedia).then(function (stream) {
    video.srcObject = stream;
    video.setAttribute("playsinline", true);
    video.play();
    startTick();
  });
  function startTick() {
    msg.innerText = "Loading video...";
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
      canvas.height = video.videoHeight;
      canvas.width = video.videoWidth;
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      var img = ctx.getImageData(0, 0, canvas.width, canvas.height);
      var code = jsQR(img.data, img.width, img.height, {
        inversionAttempts: "dontInvert"
      });
      if (code) {
        drawRect(code.location); // Rect
        msg.innerText = code.data; // Data
      } else {
        msg.innerText = "Detecting QR-Code...";
      }
    }
    setTimeout(startTick, 250);
  }
  function drawRect(location) {
    drawLine(location.topLeftCorner, location.topRightCorner);
    drawLine(location.topRightCorner, location.bottomRightCorner);
    drawLine(location.bottomRightCorner, location.bottomLeftCorner);
    drawLine(location.bottomLeftCorner, location.topLeftCorner);
  }
  function drawLine(begin, end) {
    ctx.lineWidth = 4;
    ctx.strokeStyle = "#FF3B58";
    ctx.beginPath();
    ctx.moveTo(begin.x, begin.y);
    ctx.lineTo(end.x, end.y);
    ctx.stroke();
  }
};
/******/ })()
;