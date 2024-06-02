document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("companieForm")
        .addEventListener("submit", function (event) {
            let isValid = true;

            // Clear previous error messages and styles
            document
                .querySelectorAll(".error-message")
                .forEach(function (errorSpan) {
                    errorSpan.textContent = "";
                    errorSpan.style.color = ""; // Clear previous inline style
                });

            // Validate Código Postal
            const codigoPostal = document.querySelector(
                'input[name="codigo_postal"]'
            ).value;
            const codigoPostalRegex = /^\d{5}$/;
            if (!codigoPostalRegex.test(codigoPostal)) {
                const errorSpan = document.getElementById(
                    "codigo_postal_error"
                );
                errorSpan.textContent =
                    "El código postal debe tener exactamente 5 dígitos.";
                errorSpan.style.color = "red";
                isValid = false;
            }

            // Validate Email
            const emailContacto = document.querySelector(
                'input[name="email_contacto"]'
            ).value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            if (!emailRegex.test(emailContacto)) {
                const errorSpan = document.getElementById(
                    "email_contacto_error"
                );
                errorSpan.textContent =
                    "El email no es válido. Asegúrate de que tiene un @, un dominio y una terminación válida.";
                errorSpan.style.color = "red";
                isValid = false;
            }

            // Validate Teléfono Fijo
            const telefonoFijo = document.querySelector(
                'input[name="telefono_fijo"]'
            ).value;
            const telefonoRegex = /^\d{9}$/;
            if (telefonoFijo && !telefonoRegex.test(telefonoFijo)) {
                // Optional field check
                const errorSpan = document.getElementById(
                    "telefono_fijo_error"
                );
                errorSpan.textContent =
                    "El teléfono fijo debe tener exactamente 9 dígitos.";
                errorSpan.style.color = "red";
                isValid = false;
            }

            // Validate Teléfono Móvil
            const telefonoMovil = document.querySelector(
                'input[name="telefono_movil"]'
            ).value;
            if (!telefonoRegex.test(telefonoMovil)) {
                const errorSpan = document.getElementById(
                    "telefono_movil_error"
                );
                errorSpan.textContent =
                    "El teléfono móvil debe tener exactamente 9 dígitos.";
                errorSpan.style.color = "red";
                isValid = false;
            }

            // Validate Plazas Disponibles
            const plazasDisponibles = document.querySelector(
                'input[name="plazas_disponibles"]'
            ).value;
            if (isNaN(plazasDisponibles) || plazasDisponibles <= 0) {
                const errorSpan = document.getElementById(
                    "plazas_disponibles_error"
                );
                errorSpan.textContent =
                    "Las plazas disponibles deben ser un número positivo.";
                errorSpan.style.color = "red";
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
});
