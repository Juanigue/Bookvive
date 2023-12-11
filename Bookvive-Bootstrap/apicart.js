//primero capturo el contenedor que va a tener todos los productos de adentro
const shopContent = document.getElementById("shopContent"); //va a capturar los elementos que contengan el id shopContent
const cart = []; //inicializo un array vacio para luego introducirle los productos dentro del carrito
//recorrer el array para iterar cada objeto dentro de ese array
//en este caso la palabra product entre parentesis hace referencia a todos los objetos que yo tengo dentro del array productos
productos.forEach((product) => {            
    const content = document.createElement("div"); //crea un div dinamicamente con js
    //innerhtml para hacer html aqui
    content.innerHTML = `
        <img src="${product.img}">
        <h3>${product.productName}</h3>
        <p class="price">${product.price}</p>
        <p class="quantity">${product.quantity}</p>
    `;
    shopContent.append(content); //agrega el div creado al contenedor shopContent

    const buyButton = document.createElement("button");

    buyButton.innerText = "Comprar";
    content.append(buyButton);

    buyButton.addEventListener("click", () => {
        cart.push({
            id: product.id,
            productName: product.productName,
            price: product.price,
            quantity: product.quantity,
            img: product.img,
        })
        console.log(cart)
    })
});