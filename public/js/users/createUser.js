document
    .getElementById("userForm")
    .addEventListener("submit", function (event) {
        // Evitar el envío del formulario por defecto
        event.preventDefault();

        let isValid = true;

        // Clear previous error messages and styles
        document
            .querySelectorAll(".error-message")
            .forEach(function (errorSpan) {
                errorSpan.textContent = "";
                errorSpan.style.color = ""; // Clear previous inline style
            });

        // Validar Email
        const email = document.querySelector('input[name="email"]').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
        if (!emailRegex.test(email)) {
            const errorSpan = document.getElementById("email_error");
            errorSpan.textContent =
                "El email no es válido. Asegúrate de que tiene un @, un dominio y una terminación válida.";
            errorSpan.style.color = "red";
            isValid = false;
        }

        // Validar Contraseña
        const password = document.querySelector('input[name="password"]').value;
        const passwordRegex =  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (!passwordRegex.test(password)) {
            const errorSpan = document.getElementById("password_error");
            errorSpan.textContent =
                "La contraseña debe tener 8 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un caracter especial.";
            errorSpan.style.color = "red";
            isValid = false;
        }

        // Si la validación es exitosa, enviar el formulario
        if (isValid) {
            this.submit(); // Envía el formulario
        }
    });

//- - - - - - - - - - - - - - - - - - - Mostrar Pass Generada- - - - - - - - - - - - - - - - --
function mostrarPass() {
    if (document.getElementById("check").checked) {
        document.getElementById("password").type = "text";
    } else {
        document.getElementById("password").type = "password";
    }
}
