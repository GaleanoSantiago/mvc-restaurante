// Selecciona todos los elementos .mesa-box
const mesaBoxes = document.querySelectorAll('.mesa-box');

// Selecciona el elemento <p> .side-descripcion
const sideDescripcion = document.querySelector('.side-descripcion');

// Itera sobre cada .mesa-box y agrega un evento 'mouseover'
mesaBoxes.forEach(mesaBox => {
    mesaBox.addEventListener('mouseover', () => {
        // Obtén el contenido del .descripcion-mesa dentro del .mesa-box actual
        const descripcion = mesaBox.querySelector('.descripcion-mesa').textContent;
        // Actualiza el contenido del <p> .side-descripcion
        sideDescripcion.textContent = descripcion;
    });

    // Para que el texto desaparezca
    mesaBox.addEventListener('mouseleave', () => {
        sideDescripcion.textContent = 'Pase el mouse sobre una mesa para ver detalles!'; // Limpia la descripción
    });
});


