document.getElementById("tutorForm").addEventListener("submit", function (event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();

    let isValid = true;

    // Clear previous error messages and styles
    document.querySelectorAll(".error-message").forEach(function (errorSpan) {
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

    // Validar Teléfono Móvil
    const telefonoMovil = document.querySelector('input[name="telefono_movil"]').value;
    const telefonoMovilRegex = /^\d{9}$/;
    if (!telefonoMovilRegex.test(telefonoMovil)) {
        const errorSpan = document.getElementById("telefono_movil_error");
        errorSpan.textContent =
            "El teléfono móvil debe tener exactamente 9 dígitos.";
        errorSpan.style.color = "red";
        isValid = false;
    }

    // Si la validación es exitosa, enviar el formulario
    if (isValid) {
        this.submit(); // Envía el formulario
    }
});
