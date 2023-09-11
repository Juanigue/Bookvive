var itemsPerPage = 12; // Número de elementos por página
var currentPage = 1; // Página actual
var gridItems = document.querySelectorAll('.grid-item'); // Todos los elementos de la cuadrícula

function showPage(page) {
  for (var i = 0; i < gridItems.length; i++) {
    if (i < page * itemsPerPage && i >= (page - 1) * itemsPerPage) {
      gridItems[i].style.display = 'block';
    } else {
      gridItems[i].style.display = 'none';
    }
  }
}
// ...

function addPaginationButtons() {
  var paginationContainer = document.getElementById('pagination');
  var numberOfPages = Math.ceil(gridItems.length / itemsPerPage);

  var prevBtn = document.createElement('button');
  prevBtn.innerHTML = 'Anterior';
  prevBtn.onclick = function() {
    if (currentPage > 1) {
      currentPage--;
      showPage(currentPage);
      updatePaginationButtons();
    }
  };
  paginationContainer.appendChild(prevBtn);

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

  var nextBtn = document.createElement('button');
  nextBtn.innerHTML = 'Siguiente';
  nextBtn.onclick = function() {
    if (currentPage < numberOfPages) {
      currentPage++;
      showPage(currentPage);
      updatePaginationButtons();
    }
  };
  paginationContainer.appendChild(nextBtn);

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

// ...


showPage(currentPage);
addPaginationButtons();
