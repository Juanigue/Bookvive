var itemsPerPage = 3; // Número de elementos por página
var currentPage = 1; // Página actual
var items = document.querySelectorAll('.item'); // Todos los elementos de productos

function showPage(page) {
  for (var i = 0; i < items.length; i++) {
    if (i < page * itemsPerPage && i >= (page - 1) * itemsPerPage) {
      items[i].style.display = 'block';
    } else {
      items[i].style.display = 'none';
    }
  }
}

function addPaginationButtons() {
  var paginationContainer = document.querySelector('.pagination');
  var numberOfPages = Math.ceil(items.length / itemsPerPage);

  for (var i = 1; i <= numberOfPages; i++) {
    var btn = document.createElement('button');
    btn.innerText = i;
    btn.onclick = function(e) {
      currentPage = Number(e.target.innerText);
      showPage(currentPage);
      updatePaginationButtons();
    };
    paginationContainer.appendChild(btn);
  }

  // Función para actualizar los estilos de los botones de paginación
  function updatePaginationButtons() {
    var buttons = paginationContainer.querySelectorAll('button');
    buttons.forEach(function(button) {
      if (Number(button.innerText) === currentPage) {
        button.classList.add('current-page'); // Agrega la clase de estilo al número de página actual
      } else {
        button.classList.remove('current-page'); // Elimina la clase de estilo de otros números de página
      }
    });
  }

  // Inicialmente, establece el estilo para la página actual
  updatePaginationButtons();
}

// Mostrar la primera página al cargar la página
showPage(currentPage);
// Agregar botones de paginación
addPaginationButtons();
