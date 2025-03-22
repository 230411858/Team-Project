document.addEventListener("DOMContentLoaded", function () {
    const checkoutForm = document.querySelector("#checkout-form");
    const shippingDetailsSection = document.querySelector("#shipping-details-section");
    const shippingMethodSection = document.querySelector("#shipping-method-section");
    const saveShippingDetailsButton = document.querySelector("#save-shipping-details");
    const compressedView = document.querySelector("#compressed-view");
    const compressedViewMethod = document.querySelector("#compressed-view-method");
    const editShippingLink = document.querySelector("#edit-shipping");
    const editMethodLink = document.querySelector("#edit-method");
    const paypalContainer = document.querySelector("#paypal-button-container");
    const applyPromoButton = document.querySelector("#apply-promo");
    const promoInput = document.querySelector("#promo-input");
    const promoMessage = document.querySelector("#promo-message");
    const subtotalElement = document.querySelector("#subtotal-price");
    const savingsElement = document.querySelector("#savings-price");
    const totalElement = document.querySelector("#total-price");
  
    // Base price per item
    const pricePerItem = 89.99;
  
    // Track shipping cost globally so we can update totals
    let shippingCost = 0;
  
    let isShippingDetailsCompleted = false;
    let isShippingMethodCompleted = false;
  
    /**
     * Displays a small red text message and adds a red border to the input.
     */
    function showError(input, message) {
      // Create error message element
      const error = document.createElement("div");
      error.className = "error-message";
      error.textContent = message;
  
      // Add red border to the input
      input.classList.add("error-border");
  
      // Place the error message right after the input
      input.parentElement.appendChild(error);
    }
  
    /**
     * Removes all error messages and red borders.
     */
    function resetErrors() {
      document.querySelectorAll(".error-message").forEach((el) => el.remove());
      document.querySelectorAll("input").forEach((input) => {
        input.classList.remove("error-border");
        input.style.borderColor = "";
      });
    }
  
    function validateBeforePayPal() {
      if (!isShippingDetailsCompleted || !isShippingMethodCompleted) {
        alert("Please complete both the shipping details and the shipping method before proceeding with payment.");
        return false;
      }
      return true;
    }
  
    // PayPal Buttons
    paypal.Buttons({
      createOrder: function (data, actions) {
        if (!validateBeforePayPal()) {
          return;
        }
        const totalValue = document.getElementById("total-price").textContent.replace("£", "");
        return actions.order.create({
          purchase_units: [{
            amount: {
              currency_code: "GBP",
              value: totalValue.trim()
            }
          }]
        });
      },
      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          window.location.href = "thankyou.html"; // Redirect to Thank You page
        });
      },
      onError: function (err) {
        console.error(err);
      }
    }).render("#paypal-button-container");
  
    // --- Shipping Details Section ---
    saveShippingDetailsButton.addEventListener("click", function (e) {
      e.preventDefault();
      resetErrors(); // Clear old errors each time
  
      let isValid = true;
      const email = document.querySelector("#email");
      const firstName = document.querySelector("#first_name");
      const lastName = document.querySelector("#last_name");
      const address = document.querySelector("#address_line_1");
      const city = document.querySelector("#city");
      const postcode = document.querySelector("#postcode");
      const phoneNumber = document.querySelector("#phone_number");
  
      if (!email.value.includes("@")) {
        showError(email, "Please enter a valid email.");
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
      if (postcode.value.trim() === "") {
        showError(postcode, "Postcode is required.");
        isValid = false;
      }
      if (phoneNumber.value.trim() === "") {
        showError(phoneNumber, "Phone number is required.");
        isValid = false;
      }
  
      // If valid, hide shipping details & show compressed view
      if (isValid) {
        const formattedAddress = `
          <strong>${firstName.value} ${lastName.value}</strong><br>
          ${address.value}<br>
          ${city.value}, ${postcode.value}<br>
          ${phoneNumber.value}<br>
          ${email.value}
        `;
        document.querySelector("#compressed-shipping").innerHTML = formattedAddress;
        document.querySelector("#compressed-billing").innerHTML = formattedAddress;
  
        shippingDetailsSection.style.display = "block";
        shippingDetailsSection.style.display = "none";
        compressedView.style.display = "block";
        isShippingDetailsCompleted = true;
        shippingMethodSection.style.display = "block";
      }
    });
  
  
    $(document).ready(function () {
      $('#checkout-form').on('submit', function (e) {
        e.preventDefault();
        const selectedMethod = document.querySelector('input[name="shipping_method"]:checked');
        if (selectedMethod) {
          // Set shipping cost based on the chosen method
          if (selectedMethod.value === "standard") {
            shippingCost = 2.99;
          } else if (selectedMethod.value === "express") {
            shippingCost = 4.99;
          }

          const subtotal = parseFloat(subtotalElement.textContent.replace("£", ""));

          const savingsPrice = parseFloat(savingsElement.textContent.replace("£", ""));

          var total = 0;

          if (savingsPrice > 0) {
            total = subtotal + shippingCost - savingsPrice;
          }
          else {
            total = subtotal + shippingCost;
          }

          totalElement.textContent = `£${total.toFixed(2)}`;
  
          // Update the compressed view
          document.querySelector("#compressed-method").textContent = selectedMethod.value == "express" ? "Express Shipping" : "Standard Shipping";
          document.querySelector("#compressed-method-details").textContent = selectedMethod.dataset.details;
  
          compressedViewMethod.style.display = "block";
          shippingMethodSection.style.display = "none";
          isShippingMethodCompleted = true;
  
        } else {
          alert("Please select a shipping method.");
        }
        jQuery.ajax({
          url: "/checkout",
          data: jQuery('#checkout-form').serialize(),
          type: 'post',
        })
      });
    });
  
    // --- Edit Actions ---
    editShippingLink.addEventListener("click", function (e) {
      e.preventDefault();
      // Show shipping details again
      shippingDetailsSection.style.display = "block";
      compressedView.style.display = "none";
      compressedViewMethod.style.display = "none";
      shippingMethodSection.style.display = "none";
      isShippingDetailsCompleted = false;
      isShippingMethodCompleted = false;
      // Reset shipping cost if user goes back
      shippingCost = 0;
    });
  
    editMethodLink.addEventListener("click", function (e) {
      e.preventDefault();
      compressedViewMethod.style.display = "none";
      shippingMethodSection.style.display = "block";
      isShippingMethodCompleted = false;
      shippingCost = 0;
    });
  
    // --- Promo Code ---
    applyPromoButton.addEventListener("click", function () {
      const promoCode = promoInput.value.trim().toLowerCase();
      const subtotal = parseFloat(subtotalElement.textContent.replace("£", ""));
      let discountedTotal = subtotal;
      let savings = 0;
  
      if (promoCode === "blackfriday20") {
        discountedTotal = subtotal * 0.8;
        savings = subtotal - discountedTotal + shippingCost;
        totalElement.textContent = `£${discountedTotal.toFixed(2)}`;
        savingsElement.textContent = `£${savings.toFixed(2)}`;
        document.getElementById("savings-section").style.display = "flex";
        promoMessage.textContent = "Promo code applied successfully!";
        promoMessage.style.color = "green";
      } else {
        document.getElementById("savings-section").style.display = "none";
        promoMessage.textContent = "Invalid promo code.";
        promoMessage.style.color = "red";
      }
    });
  });
  