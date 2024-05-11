

// TRANSITION FOR NAVBAR
window.addEventListener('scroll', function() {
    let navbar = document.getElementById('navbar');
    let welcome = document.querySelector('.welcome');


    if (window.scrollY > 10) { // Cambia 50 al valor que desees
        navbar.classList.add('navbar-scrolled');
        navbar.setAttribute('data-bs-theme', 'dark');
        navbar.style.backdropFilter = 'blur(10px)'; // Ajusta el valor de desenfoque según sea necesario
        welcome.style.color = 'white';  


    } else {
        navbar.classList.remove('navbar-scrolled');
        navbar.removeAttribute('data-bs-theme');
        navbar.style.backdropFilter = 'none'; // Elimina el desenfoque cuando no se hace scroll
        welcome.style.color = 'black';


    }
});
