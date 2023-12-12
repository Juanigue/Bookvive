//primero capturo el contenedor que va a tener todos los productos de adentro
const shopContent = document.getElementById("shopContent"); //va a capturar los elementos que contengan el id shopContent
const cart = []; //inicializo un array vacio para luego introducirle los productos dentro del carrito

// Número total de productos
const numProducts = productos.length;

// Número de productos por página
const perPage = 5;

// Número total de páginas
const numPages = Math.ceil(numProducts / perPage);

// Crear la paginación
const pagination = document.querySelector(".num-pagination");

// Crear los botones de paginación
for (let i = 1; i <= numPages; i++) {
  const pageItem = document.createElement("li");
  pageItem.className = "page-item";

  const pageLink = document.createElement("a");
  pageLink.className = "page-link";
  pageLink.href = "#";
  pageLink.innerText = i;

  pageItem.append(pageLink);
  pagination.append(pageItem);

  // Evento al hacer click en un botón de paginación
  pageLink.addEventListener("click", (e) => {
    e.preventDefault();

    // Limpiar el contenedor
    shopContent.innerHTML = "";

    // Obtener los productos de la página actual
    const start = (i - 1) * perPage;
    const end = start + perPage;
    const productsPage = productos.slice(start, end);

    // Generar las tarjetas de los productos
    productsPage.forEach((product) => {
      const card = document.createElement("div");
      card.className = "card m-2";
      card.style.width = "18rem";

      // Crear el contenido de la tarjeta
      const content = document.createElement("div");
      content.className = "card-body";
      content.innerHTML = `
        <img src="${product.img}" class="card-img-top">
        <h5 class="card-title pt-3">${product.productName}</h5>
        <p class="card-text">${product.description}</p>
        <b class="price">$ ${product.price}</b>
        <p class="quantity"></p>
    `;

      // Agregar el contenido a la tarjeta
      card.append(content);

      // Crear el botón de compra con clases de Bootstrap
      const buyButton = document.createElement("button");
      buyButton.innerText = "Agregar al Carrito";
      buyButton.className = "btn btn-dark";
      content.append(buyButton);
      // Agregar el evento al botón de compra
      buyButton.addEventListener("click", () => {
        const repeatProduct = cart.some(
          (repeatProduct) => repeatProduct.id === product.id
        );
        if (repeatProduct) {
          cart.map((prod) => {
            if (prod.id === product.id) {
              prod.quantity++;
              displayCartCounter();
            }
          });
        } else {
          cart.push({
            id: product.id,
            productName: product.productName,
            price: product.price,
            quantity: product.quantity,
            img: product.img,
          });
          displayCartCounter();
        }
        console.log(cart);
      });

      // Agregar la tarjeta al contenedor principal
      shopContent.append(card);
    });

    // Resaltar el botón de la página actual
    document.querySelectorAll(".page-item").forEach((item) => {
      item.classList.remove("active");
    });
    pageItem.classList.add("active");
  });

  // Invocar el evento de clic en el primer botón de paginación
  if (i === 1) {
    pageLink.click();
  }
}
