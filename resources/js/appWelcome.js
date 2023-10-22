document.addEventListener('DOMContentLoaded', () => {
    let containerImages = document.querySelector('.sectionCards');
    let zoomLevel = 100;
    containerImages.addEventListener('click', (e) => {
        if (e.target.classList[1] === 'imagen-ampliada') {
            let imagen = document.querySelector('.imagen-ampliada');
            let zoomLevel = 100;

            let overlay = document.createElement('div');
            overlay.className = 'overlay';

            let imagenAmpliada = document.createElement('img');
            imagenAmpliada.src = imagen.src;
            imagenAmpliada.className = 'imagen-ampliada';

            imagenAmpliada.style.width = zoomLevel + '%';

            overlay.appendChild(imagenAmpliada);

            let boton1 = document.createElement('button');
            boton1.textContent = '+';
            boton1.className = 'boton1';
            overlay.appendChild(boton1);

            let boton2 = document.createElement('button');
            boton2.textContent = '-';
            boton2.className = 'boton2';
            overlay.appendChild(boton2);

            document.body.appendChild(overlay);

            overlay.addEventListener('click', function (event) {
                if (event.target === boton1) {
                    zoomLevel += 10;
                    imagenAmpliada.style.width = zoomLevel + '%';
                } else if (event.target === boton2) {
                    zoomLevel -= 10;
                    imagenAmpliada.style.width = zoomLevel + '%';
                } else {
                    document.body.removeChild(overlay);
                }
            });
        }
    });
})
