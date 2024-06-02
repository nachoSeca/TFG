let usuarios = [
    { email: "patata@example.com", contraseña: "pass1" },
    { email: "usuario2@example.com", contraseña: "pass2" },
    { email: "usuario3@example.com", contraseña: "pass3" }
];



function comprobarEmailYPass() {
    let emailInput = document.getElementById("email").value.trim();
    let passInput = document.getElementById("pass").value.trim();

    let usuarioEncontrado = usuarios.find(usuario => usuario.email === emailInput && usuario.contraseña === passInput);
    if(emailInput==="" && passInput===""){
    }
    else if (usuarioEncontrado) {
        mostrarAlerta("¡Todo OK!", "green");
    } else {
        mostrarAlerta("Email o contraseña incorrectos", "red");
    }
}

function mostrarAlerta(mensaje, color) {
    let alerta = document.createElement("div");
    alerta.textContent = mensaje;
    alerta.style.color = color;
    alerta.style.padding = "10px";
    alerta.style.backgroundColor = "rgba(255, 0, 0, 0.3)";
    alerta.style.border = "1px solid " + color;
    alerta.style.borderRadius = "5px";
    alerta.style.position = "fixed";
    alerta.style.bottom = "10px";
    alerta.style.left = "50%";
    alerta.style.transform = "translateX(-50%)";
    alerta.style.transition = "opacity 0.5s ease-in-out";
    alerta.style.opacity = "1";
    document.body.appendChild(alerta);

    setTimeout(function () {
        alerta.style.opacity = "0";
        setTimeout(function () {
            alerta.parentNode.removeChild(alerta);
        }, 5000);
    }, 4000);
}


//- - - - - - - - - - - - - - - - - - - - - MODO OSCURO - - - - - - - -  - - - - - - - - - - - - - - - - 
/*function cambiarTema(){
    if (document.getElementById("modoBatman").checked){
        document.documentElement.setAttribute("data-bs-theme","dark");
    }else{
        document.documentElement.setAttribute("data-bs-theme","light");
    }
}


*/
//- - - - - - - - - - - - - - - - - - - Mostrar Pass Generada- - - - - - - - - - - - - - - - -- 
function mostrarPass(){
    if ((document.getElementById("check").checked)){
        document.getElementById("pass").type = "text"
    }else{
        (document.getElementById("pass").type ="password")
    }
}
/*

//- - - - - - - - - - - - - - - - - - EMAIL- - - - - - - - - - - - - - - - - - - - - - - - - - - -
function comprobarEmail() {
    let emailInput = document.getElementById("email");
    let emailValue = emailInput.value.trim();

    let validarEmail = /\S+@\S+\.\S+/;

    if (!validarEmail.test(emailValue)) {
        mostrarAlerta("El Email no es válido", "red");
    } else {
        mostrarAlerta("El Email es válido", "green");
    }
}
//- - - - - - - - - - - - - - - - - -CONTRASENIA- - - - - - - - - - - - - - - - - - - - -  
function comprobarContrasenia() {
    let contraseniaInput = document.getElementById("pass");
    let contrasenia = contraseniaInput.value.trim();

    if (validarCombinaciones(contrasenia) && verificaConsecutivas(contrasenia)) {
        mostrarAlerta("La contraseña es válida", "green");
    } else {
        mostrarAlerta("La contraseña es inválida", "red");
    }
}
//- - - - - - - - - - - - - - - - -VALIDADOR - - - - - - - - - - - - -
function validate() {
    comprobarEmail()
    comprobarContrasenia()
}

//- - - - - - - - - - - - - - - - -Mostrar alerta - - - - - - - - - - - - -

function mostrarAlerta(mensaje, color) {
    let alerta = document.createElement("div");
    alerta.textContent = mensaje;
    alerta.style.color = color;
    alerta.style.padding = "10px";
    alerta.style.backgroundColor = "rgba(255, 0, 0, 0.3)";
    alerta.style.border = "1px solid " + color;
    alerta.style.borderRadius = "5px";
    alerta.style.position = "fixed";
    alerta.style.bottom = "10px";
    alerta.style.left = "50%";
    alerta.style.transform = "translateX(-50%)";
    alerta.style.transition = "opacity 0.5s ease-in-out";
    alerta.style.opacity = "1";
    document.body.appendChild(alerta);

    setTimeout(function () {
        alerta.style.opacity = "0";
        setTimeout(function () {
            alerta.parentNode.removeChild(alerta);
        }, 500);
    }, 4000);
}

//- - - - -  - - -  - - - - - - - - - - - -MOSTRAR PASS - - - - - - - - - - - - - - - - - - - - - 
function mostrarPass(){
    if ((document.getElementById("check").checked)){
        document.getElementById("pass").type = "text"
    }else{
        (document.getElementById("pass").type ="password")
    }
}
//- - - - - - - - - - - - - - - - - -GENERAR CONTRASENIA- - - - - - - - - - - - - - - - - - - - -  
pase1 = 12;
function validarCombinaciones (pass){
    if (/\d/.test(pass) && /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(pass) && /[A-Z]/.test(pass) &&  /[a-z]/.test(pass)) {
      return  true; 
    }return  false ;
}

function verificaConsecutivas(pass) {
  const patron =  /(\d{2,}|[a-zA-Z]{2,})/;
    if (patron.test(pass)) {
      return  false;
    } else {
      return  true;
    }
}

function validatePassword(pass){
  if (validarCombinaciones(pass) == true && verificaConsecutivas(pass) == true){
    return true;
  }else {
    return false;
  }
}

function generatePassword() {
  let pass = "";
  const caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+[]{}|;:,.<>?";
  let passValida = false;
    do {
        pass = "";
        for (let i = 0; i < pase1; i++) {
        const caracterAleatorio = caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        pass += caracterAleatorio;
        }
    passValida = validatePassword(pass)
    }while (!passValida);
return  pass;  
}

function mostrarPassGenerada(){
    let passGenerada = generatePassword();
   //alert ("Tu contraseña generada es: "+passGenerada);
    if ((document.getElementById("generarPass").checked)){
        document.getElementById("pass").value = passGenerada;
    }else{
        (document.getElementById("pass").value ="")
    }
}
//- - - - - - - - - - - - - - - - - - - - - MODO OSCURO - - - - - - - -  - - - - - - - - - - - - - - - - 
function cambiarTema(){
    if (document.getElementById("modoBatman").checked){
        document.documentElement.setAttribute("data-bs-theme","dark");
    }else{
        document.documentElement.setAttribute("data-bs-theme","light");
    }
}
//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   

*/