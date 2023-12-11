// Cuando el documento esté listo
$(document).ready(function () {
  // Encuentra el dropdown del carrito
  var dropdown = document.querySelector(".dropdown");
  // Encuentra el botón del carrito
  var button = document.querySelector(".dropdown-toggle");

  // Cuando hagas clic en el botón del carrito
  button.addEventListener("click", function (event) {
    // Evita que el dropdown se cierre automáticamente
    event.stopPropagation();
    // Abre o cierra el dropdown manualmente
    $(dropdown).toggleClass("show");
  });

  // Cuando hagas clic fuera del dropdown
  window.onclick = function (event) {
    if (!event.target.matches(".dropdown-toggle")) {
      // Si el dropdown está abierto
      if ($(dropdown).hasClass("show")) {
        // No hagas nada (no cierres el dropdown)
      } else {
        // Si el dropdown está cerrado, ciérralo
        $(dropdown).removeClass("show");
      }
    }
  };
});
// Primero, seleccionamos todos los botones "Agregar al Carrito"
let botones = document.querySelectorAll(".btn-dark");

// Luego, iteramos sobre cada botón y agregamos un evento de click
botones.forEach((btn) => {
  btn.addEventListener("click", function (event) {
    // Evitamos que el botón haga un refresh de la página
    event.preventDefault();

    // Obtenemos los detalles del producto
    let card = this.parentElement;
    let title = card.querySelector(".card-title").innerText;
    let price = card.querySelector(".price").innerText;

    // Creamos un nuevo elemento para el carrito
    let newProduct = document.createElement("div");
    newProduct.innerHTML = `
            <p>${title} - ${price}</p>
          `;

    // Agregamos el nuevo producto al carrito
    let cart = document.querySelector(".row-product");
    cart.appendChild(newProduct);

    // Actualizamos el total
    let total = document.querySelector(".total-pagar");
    total.innerText = parseFloat(total.innerText) + parseFloat(price.slice(1));

    // Actualizamos el contador de productos
    let counter = document.querySelector("#contador-productos");
    counter.innerText = parseInt(counter.innerText) + 1;
  });
});
