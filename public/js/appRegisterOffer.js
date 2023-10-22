/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/appRegisterOffer.js ***!
  \******************************************/
var optionsForSelect = document.getElementById('selectForm');
var optionSelect = optionsForSelect.value;
var formRellenar = document.getElementById('formRellenar');
var formImg = document.getElementById('formImg');

// Esperamos a que el usuario realice un cambio en el menu para poder desplegarlo u ocultarlo
optionsForSelect.addEventListener('change', function (e) {
  showAndForms();
});
// Validamos que opcion se eligio para ocultar o desplegar el formulario
var showAndForms = function showAndForms() {
  if (optionsForSelect.value === '0') {
    formRellenar.style.display = 'block';
    formImg.style.display = 'none';
    return;
  }
  formRellenar.style.display = 'none';
  formImg.style.display = 'block';
};
showAndForms();
/******/ })()
;