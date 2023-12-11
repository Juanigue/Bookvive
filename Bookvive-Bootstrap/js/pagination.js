var itemsPerPage = 4; // Número de elementos por página
var currentPage = 1; // Página actual
var items = document.querySelectorAll(".item"); // Todos los elementos de productos

function showPage(page) {
  for (var i = 0; i < items.length; i++) {
    if (i < page * itemsPerPage && i >= (page - 1) * itemsPerPage) {
      items[i].style.display = "block";
    } else {
      items[i].style.display = "none";
    }
  }
}

function updatePaginationButtons() {
  var buttons = document.querySelectorAll(".num-pagination .page-item");
  buttons.forEach(function (button, index) {
    if (index + 1 === currentPage) {
      button.classList.add("current-page", "active"); // Agrega 'active' para cambiar el color a azul
    } else {
      button.classList.remove("current-page", "active");
    }
  });
}

function handlePageClick(e) {
  e.preventDefault();
  var clickedPage = parseInt(e.target.innerText);
  if (!isNaN(clickedPage)) {
    currentPage = clickedPage;
    showPage(currentPage);
    updatePaginationButtons();
  }
}

function addBootstrapPaginationListeners() {
  var paginationButtons = document.querySelectorAll(
    ".num-pagination .page-link"
  );
  paginationButtons.forEach(function (button) {
    button.addEventListener("click", handlePageClick);
  });
}

function addPaginationButtons() {
  var paginationContainer = document.querySelector(".num-pagination");
  var numberOfPages = Math.ceil(items.length / itemsPerPage);

  for (var i = 1; i <= numberOfPages; i++) {
    var li = document.createElement("li");
    li.classList.add("page-item");
    var a = document.createElement("a");
    a.classList.add("page-link");
    a.href = "#";
    a.innerText = i;
    li.appendChild(a);
    paginationContainer.appendChild(li);
  }

  updatePaginationButtons();
  addBootstrapPaginationListeners();
}

showPage(currentPage);
addPaginationButtons();
