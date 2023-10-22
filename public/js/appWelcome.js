/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/appWelcome.js ***!
  \************************************/
document.addEventListener('DOMContentLoaded', function () {
  var containerImages = document.querySelector('.sectionCards');
  var zoomLevel = 100;
  containerImages.addEventListener('click', function (e) {
    if (e.target.classList[1] === 'imagen-ampliada') {
      var imagen = document.querySelector('.imagen-ampliada');
      var _zoomLevel = 100;
      var overlay = document.createElement('div');
      overlay.className = 'overlay';
      var imagenAmpliada = document.createElement('img');
      imagenAmpliada.src = imagen.src;
      imagenAmpliada.className = 'imagen-ampliada';
      imagenAmpliada.style.width = _zoomLevel + '%';
      overlay.appendChild(imagenAmpliada);
      var boton1 = document.createElement('button');
      boton1.textContent = '+';
      boton1.className = 'boton1';
      overlay.appendChild(boton1);
      var boton2 = document.createElement('button');
      boton2.textContent = '-';
      boton2.className = 'boton2';
      overlay.appendChild(boton2);
      document.body.appendChild(overlay);
      overlay.addEventListener('click', function (event) {
        if (event.target === boton1) {
          _zoomLevel += 10;
          imagenAmpliada.style.width = _zoomLevel + '%';
          console.log("+");
        } else if (event.target === boton2) {
          _zoomLevel -= 10;
          imagenAmpliada.style.width = _zoomLevel + '%';
          console.log("-");
        } else {
          document.body.removeChild(overlay);
        }
      });
    }
  });
});
/******/ })()
;