<!DOCTYPE html>
<html>
  <head>
    <title>Bookvive | Libros</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style-productos.css" />
  </head>
  <body>
    <div class="container">
      <header>
        <img src="Logo.png" alt="Logo de Bookvive" />
      </header>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="login.php">Cuenta</a></li>
        </ul>
      </nav>
      <div class="header-2">
        <p class="header-2-left">Nuestros Libros</p>
        <div class="container-icon">
          <div class="container-cart-icon">
            <img src="cart-38-512.png" width="40px" />
            <div class="count-products">
              <span id="contador-productos">0</span>
            </div>
          </div>

          <div class="container-cart-products hidden-cart">
            <div class="row-product hidden">
              <div class="cart-product">
                <div class="info-cart-product">
                  <span class="cantidad-producto-carrito">1</span>
                  <p class="titulo-producto-carrito">Libro Ejemplo</p>
                  <span class="precio-producto-carrito">$80</span>
                </div>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="icon-close"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </div>
            </div>

            <div class="cart-total hidden">
              <h3>Total:</h3>
              <span class="total-pagar">$200</span>
              <a href="payment.html"><button class="btn-pagar">Ir a pagar</button></a>
            </div>
            <p class="cart-empty">El carrito esta vacio</p>
          </div>
        </div>
      </div>
      <!--Grilla de Productos-->
      <div class="container-items">
        <div class="item">
          <figure>
            <img
              src="rectangle-3.png"
              alt="producto"
            />
          </figure>
          <div class="info-product">
            <h2>The Psycology of Money</h2>
            <p class="price">$80</p>
            <button class="btn-add-cart">Anadir al carrito</button>
          </div>
        </div>
        <div class="item">
          <figure>
            <img
              src="rectangle-2.png"
              alt="producto"
            />
          </figure>
          <div class="info-product">
            <h2>Company of One</h2>
            <p class="price">$20</p>
            <button class="btn-add-cart">Anadir al carrito</button>
          </div>
        </div>
        <div class="item">
          <figure>
            <img
              src="rectangle-52.png"
              alt="producto"
            />
          </figure>
          <div class="info-product">
            <h2>Welcome Jungle</h2>
            <p class="price">$50</p>
            <button class="btn-add-cart">Anadir al carrito</button>
          </div>
        </div>
        <div class="item">
          <figure>
            <img
              src="periodismo.jpg"
              alt="producto"
            />
          </figure>
          <div class="info-product">
            <h2>Periodismo Herido</h2>
            <p class="price">$90</p>
            <button class="btn-add-cart">Anadir al carrito</button>
          </div>
        </div>
        <div class="item">
          <figure>
            <img
              src="rectangle-42.jpg"
              alt="producto"
            />
          </figure>
          <div class="info-product">
            <h2>Misticos y Bipedos</h2>
            <p class="price">$50</p>
            <button class="btn-add-cart">Anadir al carrito</button>
          </div>
        </div>
        <div class="item">
            <figure>
              <img
                src="rectangle-42.jpg"
                alt="producto"
              />
            </figure>
            <div class="info-product">
              <h2>Misticos y Bipedos</h2>
              <p class="price">$50</p>
              <button class="btn-add-cart">Anadir al carrito</button>
            </div>
          </div>
          <div class="item">
            <figure>
              <img
                src="rectangle-42.jpg"
                alt="producto"
              />
            </figure>
            <div class="info-product">
              <h2>Misticos y Bipedos</h2>
              <p class="price">$50</p>
              <button class="btn-add-cart">Anadir al carrito</button>
            </div>
          </div>
          <div class="item">
            <figure>
              <img
                src="rectangle-2.png"
                alt="producto"
              />
            </figure>
            <div class="info-product">
              <h2>Company of One</h2>
              <p class="price">$20</p>
              <button class="btn-add-cart">Anadir al carrito</button>
            </div>
          </div>
      </div>
      <div class="pagination"></div>
    </div>
    <!-- Cierre div CONTAINER PRINCIPAL-->
    <footer>
      <div>
        <img src="LogoBlanco.png" alt="Bookvive Logo" height="80px" />
      </div>
      <div>
        <p class="contacto">Contactanos</p>
        <a href="https://www.instagram.com/">@Bookvive</a>
        <p>booksrevives@gmail.com</p>
        <p>+54 9 2616275466</p>
      </div>
    </footer>
    <script src="pagination.js"></script>
    <script src="carrito.js"></script>
  </body>
</html>
