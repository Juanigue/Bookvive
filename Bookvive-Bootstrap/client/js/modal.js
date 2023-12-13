const modalOverlay = document.getElementById("modal-overlay");
const modalContainer = document.getElementById("modal-container");
const cartBtn = document.getElementById("cart-btn");
const cartCounter = document.getElementById("cart-counter");
const cartCounterDropdown = document.getElementById("cart-counter-dropdown");

const displayCart = () => {
  modalContainer.innerHTML = ""; //Para que no se repita el carrito de compras
  modalContainer.style.display = "block";
  modalOverlay.style.display = "block";
  //Header Modal
  const modalHeader = document.createElement("div");

  const modalClose = document.createElement("div");
  modalClose.className = "modal-close fas fa-window-close";
  modalHeader.append(modalClose); //Le introducimos el boton de cerrar el modal al header

  //Para cerrar el carrito
  modalClose.addEventListener("click", () => {
    modalContainer.style.display = "none";
    modalOverlay.style.display = "none";
  });

  const modalTitle = document.createElement("h2");
  modalTitle.innerText = "Carrito de Compras";
  modalTitle.className = "p-1 m-1";
  modalHeader.append(modalTitle); // Le introducimos el titulo del modal al header

  modalContainer.append(modalHeader); //Le introducimos el header al modal en general

  //Body Modal
  if (cart.length > 0) {
    //Si hay almenos 1 producto en el carrito que haga todo el modalBody
    cart.forEach((product) => {
      const modalBody = document.createElement("div");
      modalBody.className = "modal-body";
      modalBody.innerHTML = `
      <div class="product d-flex flex-column flex-md-row align-items-center justify-content-between">
        <img class="rounded p-2 flex-shrink-0" style="width: 25%;" src="${product.img}" >
        <div class="product-title ps-2">
          <h4>${product.title}</h4>
        </div>
        <div class="quantity d-flex align-items-center ps-2">
          <span class="quantity-btn-decrease fas fa-minus-square me-2"></span>
          <span class="quantity-input p-2">${product.quantity}</span>
          <span class="quantity-btn-increase fas fa-plus-square ms-2"></span>
        </div>
        <div class="unit_price ps-2">
          <span>${product.price}</span>
        </div>
        <div class="delete-product ps-2 fas fa-trash"></div>
      </div>
      `;
      modalContainer.append(modalBody);

      modalContainer.append(modalBody);
      //queryselector para capturar clases de css
      const disminuir = modalBody.querySelector(".quantity-btn-decrease");
      const aumentar = modalBody.querySelector(".quantity-btn-increase");
      const deleteProduct = modalBody.querySelector(".delete-product");

      aumentar.addEventListener("click", () => {
        product.quantity++;
        displayCart();
        displayCartCounter(); //Para que se actualice el contador de productos en el carrito de compras
      });
      disminuir.addEventListener("click", () => {
        if (product.quantity !== 1) {
          product.quantity--;
          displayCart();
          displayCartCounter();
        }
      });
      deleteProduct.addEventListener("click", () => {
        deleteCartProducts(product.id);
      });
    });
  } else {
    const modalText = document.createElement("h3");
    modalText.className = "p-1 m-1";
    modalText.innerText = "No hay productos en el carrito";
    modalContainer.append(modalText); //Le introducimos el texto al modal en general
    document.getElementById("checkout-btn").style.display = "none";
  }

  //Footer Modal
  const totalPrice = cart.reduce(
    (acc, product) => acc + product.price * product.quantity,
    0
  );

  const modalFooter = document.createElement("div");
  modalFooter.className = "modal-footer";
  modalFooter.innerHTML = `
  <div class="total-price p-3 m-3">Total: $ ${totalPrice}</div>
  <button id="checkout-btn" class="btn btn-primary p-2 m-2">Finalizar Compra</button>
  <div class="p-2 m-3">
    <div id="wallet_container"></div>
  </div>

  
  `;
  modalContainer.append(modalFooter);

  const mp = new MercadoPago("TEST-564a2228-ea16-48ea-b54d-a604593c9e4d", {
    locale: "es-AR",
  });
  document
    .getElementById("checkout-btn")
    .addEventListener("click", async () => {
      try {
        let orderData;

        if (cart.length === 1) {
          // Si hay solo un producto, toma la información del primer elemento en el carrito
          orderData = {
            title: cart[0].title,
            quantity: cart[0].quantity.toString(),
            price: cart[0].price,
          };
        } else {
          // Si hay más de un producto, establece el título como "Varios Libros"
          orderData = {
            title: "Varios Libros",
            quantity: 1,
            price: cart
              .reduce(
                (acc, product) => acc + product.price * product.quantity,
                0
              )
              .toString(),
          };
        }
        document.getElementById("checkout-btn").style.display = "none";
        const response = await fetch(
          "http://localhost:3000/create_preference",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(orderData),
          }
        );

        const preference = await response.json();
        createCheckoutButton(preference.id);
       
      } catch (error) {
        alert("Error, el carrito está vacío");
      }
      document.getElementById("checkout-btn").style.display = "none";
    });

  const createCheckoutButton = (preferenceId) => {
    const bricksBuilder = mp.bricks();

    const renderComponent = async () => {
      if (window.checkoutButton) window.checkoutButton.unmount();

      await bricksBuilder.create("wallet", "wallet_container", {
        initialization: {
          preferenceId: preferenceId,
        },
      });
    };
    renderComponent();
  };
};

cartBtn.addEventListener("click", displayCart);

const deleteCartProducts = (id) => {
  //detecto el producto que el usuario quiere eliminar a traves del id para saber en que posicion del array esta
  const foundId = cart.findIndex((element) => element.id === id);
  cart.splice(foundId, 1);
  updateCartCounter();
  displayCart();
  displayCartCounter();
};

const displayCartCounter = () => {
  const totalProductsQuantity = cart.reduce(
    (acc, product) => acc + product.quantity,
    0
  );
  cartCounter.innerText = totalProductsQuantity;
};
const updateCartCounter = () => {
  const totalProductsQuantity = cart.reduce(
    (acc, product) => acc + product.quantity,
    0
  );
  cartCounter.innerText = totalProductsQuantity;
};
