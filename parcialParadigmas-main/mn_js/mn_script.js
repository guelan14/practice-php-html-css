let currentIndex = 0; // Índice de la propiedad actual
const items = document.querySelectorAll(".rotador-item"); // Selecciona todos los items del rotador

// Función para mostrar la propiedad correspondiente
function mn_mostrarPropiedad(index) {
  items.forEach((item, i) => {
    item.style.display = i === index ? "block" : "none"; // Muestra el item actual y oculta los demás
  });
}

// Función para cambiar de propiedad
function mn_cambiarPropiedad(n) {
  currentIndex += n; // Cambia el índice actual
  if (currentIndex >= items.length) {
    currentIndex = 0; // Vuelve al principio si llega al final
  } else if (currentIndex < 0) {
    currentIndex = items.length - 1; // Vuelve al final si es menor que cero
  }
  mn_mostrarPropiedad(currentIndex); // Muestra la nueva propiedad
}

// Inicializa mostrando la primera propiedad
mn_mostrarPropiedad(currentIndex);
