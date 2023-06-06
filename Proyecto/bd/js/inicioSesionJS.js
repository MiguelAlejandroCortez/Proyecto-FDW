// Obtener los campos de usuario y contraseña
var nombreInput = document.querySelector('input[name="nombre"]');
var contraseñaInput = document.querySelector('input[name="contraseña"]');

// Agregar el evento de clic a los campos
nombreInput.addEventListener('click', function() {
    ocultarLabel(nombreInput);
});

contraseñaInput.addEventListener('click', function() {
    ocultarLabel(contraseñaInput);
});

// Función para ocultar el label
function ocultarLabel(input) {
    var label = input.nextElementSibling;
    label.style.display = 'none';
}