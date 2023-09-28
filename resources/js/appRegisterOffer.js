let optionsForSelect = document.getElementById('selectForm');
let optionSelect = optionsForSelect.value;
let formRellenar = document.getElementById('formRellenar');
let formImg = document.getElementById('formImg');

// Esperamos a que el usuario realice un cambio en el menu para poder desplegarlo u ocultarlo
optionsForSelect.addEventListener('change', (e) => {
    showAndForms();
});
// Validamos que opcion se eligio para ocultar o desplegar el formulario
const showAndForms = () => {
    if (optionsForSelect.value === '0') {
        formRellenar.style.display = 'block';
        formImg.style.display = 'none';
        return;
    }
    formRellenar.style.display = 'none';
    formImg.style.display = 'block';
}

showAndForms();
