document.querySelector("#passwordForm").addEventListener("submit", function (event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();

    let isValid = true;

    // Clear previous error messages and styles
    document.querySelectorAll(".error-message").forEach(function (errorSpan) {
        errorSpan.textContent = "";
        errorSpan.style.color = ""; // Clear previous inline style
    });

    // Validar que la nueva contraseña coincida con la confirmación de contraseña
    const newPassword = document.getElementById("new_password").value;
    const confirmPassword = document.getElementById("new_password_confirmation").value;
    if (newPassword !== confirmPassword) {
        const errorSpan = document.getElementById("confirm_password_error");
        errorSpan.textContent =
            "La confirmación de la contraseña no coincide con la nueva contraseña.";
        errorSpan.style.color = "red";
        isValid = false;
    }

    // Validar la nueva contraseña con la expresión regular
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(newPassword)) {
        const errorSpan = document.getElementById("new_password_error");
        errorSpan.textContent =
            "La nueva contraseña debe tener 8 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un caracter especial.";
        errorSpan.style.color = "red";
        isValid = false;
    }

    // Si la validación es exitosa, enviar el formulario
    if (isValid) {
        this.submit(); // Envía el formulario
    }
});
