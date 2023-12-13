
function registrarUsuario() {

    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const email = document.getElementById('email').value;
    const contrasena = document.getElementById('contrasena').value;
  
    // Validar que los campos no estén vacíos
    if (nombre && apellido && email && contrasena) {
      // Guardar los datos del usuario en localStorage
      localStorage.setItem('usuario', JSON.stringify({ nombre, apellido, email, contrasena }));
      alert('Usuario registrado con éxito');
      window.location.href = '/client/html/index.html';
    } else {
      alert('Por favor, completa todos los campos');
    }
  }

function iniciarSesion() {
    // Obtener los valores de los campos de entrada
    const email = document.getElementById('emailLogin').value;
    const contrasena = document.getElementById('passwordLogin').value;
  
    // Obtener los datos del usuario guardados en localStorage
    const usuarioGuardado = JSON.parse(localStorage.getItem('usuario'));
  
    // Validar las credenciales
    if (usuarioGuardado && email === usuarioGuardado.email && contrasena === usuarioGuardado.contrasena) {
      alert('Inicio de sesión exitoso');
      window.location.href = '/client/products.html'
    } else {
      alert('Usuario o contraseña incorrectos');
    }
  }
  
  // Agregar event listener al botón de inicio de sesión
  document.addEventListener('DOMContentLoaded', function() {
    const botonInicioSesion = document.querySelector('.btn-iniciar-sesion');
    botonInicioSesion.addEventListener('click', iniciarSesion);
  });
  
  // Agregar event listener al botón de registro
  document.addEventListener('DOMContentLoaded', function() {
    const botonRegistro = document.querySelector('.btn-crear-cuenta');
    botonRegistro.addEventListener('click', registrarUsuario);
  });
  

function handleRegistro() {
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const email = document.getElementById('email').value;
    const contrasena = document.getElementById('contrasena').value;
  
    // Llamar a la función de registro
    registrarUsuario(nombre, apellido, email, contrasena);
  }
  
  // Función para manejar el evento de inicio de sesión
  function handleLogin() {
    const email = document.getElementById('emailLogin').value;
    const contrasena = document.getElementById('contrasenaLogin').value;
  
    // Llamar a la función de inicio de sesión
    iniciarSesion(email, contrasena);
  }
  
  // Agregar event listeners a los botones de registro e inicio de sesión
  document.addEventListener('DOMContentLoaded', function() {
    const botonRegistro = document.querySelector('.btn-crear-cuenta');
    const botonInicioSesion = document.querySelector('.btn-iniciar-sesion');
  
    botonRegistro.addEventListener('click', handleRegistro);
    botonInicioSesion.addEventListener('click', handleLogin);
  });
  