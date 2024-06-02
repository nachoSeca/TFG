function comprobarNombre(){
    let nombreInput = document.getElementById("nombre");
    let nombreValue = nombreInput.value.trim();
    
    let soloLetra = /^[A-Za-z]+$/;   
    if(nombreValue === ""){
        return false;
    } else if (!soloLetra.test(nombreValue)) {
        return false;
    }
    
    return true;
}

function comprobarEmail (){
    let emailInput=document.getElementById("email");
    let emailValue = emailInput.value.trim();

    let validarEmail =  /\S+@\S+\.\S+/;
    if(emailValue === ""){
        return false;
    } else if(!validarEmail.test(emailValue)){
        return false;
    }

    return true;
}
     
function comprobarContrasenia (){
    let contrasenia = document.getElementById("pass");
    let contraFinal = contrasenia.value.trim();

    if (contraFinal === "") {
        return false;
    } else if (!validatePassword(contraFinal)) {
        return false;
    }

    return true;
}

// function validate() {
//     let validacionExitosa = true;
    
//     if (!comprobarNombre() || !comprobarEmail() || !comprobarContrasenia()) {
//         validacionExitosa = false;
//     }
//     if (!validacionExitosa) {
//         mostrarAlerta("Por favor, corrija los errores para crear la cuenta","red");
//         return false;
//     } else {
//         mostrarAlerta("Cuenta creada exitosamente","red");
//         return true;
//     }
// }

function validate() {
    let errores = []; // Arreglo para almacenar los errores

    // Validar el nombre
    if (!comprobarNombre()) {
        errores.push("Nombre inválido");
    }

    // Validar el email
    if (!comprobarEmail()) {
        errores.push("Email inválido");
    }

    // Validar la contraseña
    if (!comprobarContrasenia()) {
        errores.push("Contraseña inválida");
    }

    // Verificar si hay errores
    if (errores.length > 0) {
        // Construir el mensaje de error
        let mensajeError = "Por favor, corrija los siguientes errores:\n";
        errores.forEach(error => {
            mensajeError += "- " + error + "\n";
        });

        // Mostrar el mensaje de error
        mostrarAlerta(mensajeError, "red");
        return false; // Detiene el envío del formulario
    } else {
        mostrarAlerta("Cuenta creada exitosamente", "green");
        return true; // Permite que el formulario se envíe al servidor
    }
}


//- - - - -  - - -  - - - - - - - - - - - -MOSTRAR PASS - - - - - - - - - - - - - - - - - - - - - 
function mostrarPass(){
    if ((document.getElementById("check").checked)){
        document.getElementById("pass").type = "text"
    }else{
        (document.getElementById("pass").type ="password")
    }
}

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - --  - - - - - - - - - - - - - - - -- 
//- - - - - - - - - - - - - - - - - -GENERAR CONTRASENIA- - - - - - - - - - - - - - - - - - - - -  

let pase1 = 12;
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
    if ((document.getElementById("generarPass").checked)){
        document.getElementById("pass").value = passGenerada;
    }else{
        (document.getElementById("pass").value ="")
    }
}

//- - - - - - - - - - - - - - - - - - MOSTRAR ALERTAS - - - - - - - - - - - - - - - - - - - - - -   
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
    }, 5000); 
}
