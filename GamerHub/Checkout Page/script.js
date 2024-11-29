document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#checkout-form");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let isValid = true;

        const email = document.querySelector("#email");
        const firstName = document.querySelector("#first-name");
        const lastName = document.querySelector("#last-name");
        const address = document.querySelector("#address");
        const city = document.querySelector("#city");
        const postalCode = document.querySelector("#postal-code");
        const phone = document.querySelector("#phone-number");

        resetErrors();

        if (!validateEmail(email.value)) {
            showError(email, "Please enter a valid email address.");
            isValid = false;
        }
        if (firstName.value.trim() === "") {
            showError(firstName, "First name is required.");
            isValid = false;
        }
        if (lastName.value.trim() === "") {
            showError(lastName, "Last name is required.");
            isValid = false;
        }
        if (address.value.trim() === "") {
            showError(address, "Address is required.");
            isValid = false;
        }
        if (city.value.trim() === "") {
            showError(city, "City is required.");
            isValid = false;
        }
        if (postalCode.value.trim() === "") {
            showError(postalCode, "Postal code is required.");
            isValid = false;
        }
        if (!validatePhone(phone.value)) {
            showError(phone, "Please enter a valid phone number.");
            isValid = false;
        }

        if (isValid) {
            alert("Form submitted successfully!");
            form.reset();
        }
    });

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePhone(phone) {
        const phoneRegex = /^[0-9]{10,15}$/;
        return phoneRegex.test(phone);
    }

    function showError(input, message) {
        const error = document.createElement("p");
        error.textContent = message;
        error.style.color = "red";
        input.style.borderColor = "red";
        input.parentElement.appendChild(error);
    }

    function resetErrors() {
        document.querySelectorAll(".error-message").forEach((el) => el.remove());
        document.querySelectorAll("input").forEach((input) => (input.style.borderColor = ""));
    }
});
