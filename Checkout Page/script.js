document.addEventListener("DOMContentLoaded", function () {
  const checkoutForm = document.querySelector("#checkout-form");
  const shippingDetailsSection = document.querySelector("#shipping-details-section");
  const shippingMethodSection = document.querySelector("#shipping-method-section");
  const saveShippingDetailsButton = document.querySelector("#save-shipping-details");
  const saveShippingMethodButton = document.querySelector("#save-shipping-method");
  const compressedView = document.querySelector("#compressed-view");
  const compressedViewMethod = document.querySelector("#compressed-view-method");
  const editShippingLink = document.querySelector("#edit-shipping");
  const editMethodLink = document.querySelector("#edit-method");
  const paypalContainer = document.querySelector("#paypal-button-container");
  const applyPromoButton = document.querySelector("#apply-promo");
  const promoInput = document.querySelector("#promo-input");
  const promoMessage = document.querySelector("#promo-message");
  const subtotalElement = document.querySelector("#subtotal-price");
  const totalElement = document.querySelector("#total-price");
  const quantityValue = document.getElementById("quantity-value");
  const decreaseButton = document.getElementById("decrease-quantity");
  const increaseButton = document.getElementById("increase-quantity");

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
    const firstName = document.querySelector("#first-name");
    const lastName = document.querySelector("#last-name");
    const address = document.querySelector("#address");
    const city = document.querySelector("#city");
    const postalCode = document.querySelector("#postal-code");
    const phoneNumber = document.querySelector("#phone-number");

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
    if (postalCode.value.trim() === "") {
      showError(postalCode, "Postal code is required.");
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
        ${city.value}, ${postalCode.value}<br>
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

  // --- Shipping Method Section ---
  saveShippingMethodButton.addEventListener("click", function (e) {
    e.preventDefault();
    const selectedMethod = document.querySelector('input[name="shipping-method"]:checked');
    if (selectedMethod) {
      // Set shipping cost based on the chosen method
      if (selectedMethod.value === "Standard Shipping") {
        shippingCost = 2.99;
      } else if (selectedMethod.value === "Expedited Shipping") {
        shippingCost = 4.99;
      }

      // Update the compressed view
      document.querySelector("#compressed-method").textContent = selectedMethod.value;
      document.querySelector("#compressed-method-details").textContent = selectedMethod.dataset.details;

      compressedViewMethod.style.display = "block";
      shippingMethodSection.style.display = "none";
      isShippingMethodCompleted = true;

      // Update totals to reflect new shipping cost
      updateTotals();
    } else {
      alert("Please select a shipping method.");
    }
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
    updateTotals();
  });

  editMethodLink.addEventListener("click", function (e) {
    e.preventDefault();
    compressedViewMethod.style.display = "none";
    shippingMethodSection.style.display = "block";
    isShippingMethodCompleted = false;
    shippingCost = 0;
    updateTotals();
  });

  // --- Quantity Controls ---
  decreaseButton.addEventListener("click", function () {
    let quantity = parseInt(quantityValue.textContent, 10);
    if (quantity > 1) {
      quantity -= 1;
      quantityValue.textContent = quantity;
      updateTotals();
    }
  });

  increaseButton.addEventListener("click", function () {
    let quantity = parseInt(quantityValue.textContent, 10);
    quantity += 1;
    quantityValue.textContent = quantity;
    updateTotals();
  });

  // --- Promo Code ---
  applyPromoButton.addEventListener("click", function () {
    const promoCode = promoInput.value.trim().toLowerCase();
    const subtotal = parseFloat(subtotalElement.textContent.replace("£", ""));
    let discountedTotal = subtotal;
    let savings = 0;

    if (promoCode === "blackfriday20") {
      discountedTotal = subtotal * 0.8;
      savings = subtotal - discountedTotal;
      totalElement.textContent = `£${discountedTotal.toFixed(2)}`;
      document.getElementById("savings-price").textContent = `£${savings.toFixed(2)}`;
      document.getElementById("savings-section").style.display = "flex";
      promoMessage.textContent = "Promo code applied successfully!";
      promoMessage.style.color = "green";
    } else {
      document.getElementById("savings-section").style.display = "none";
      promoMessage.textContent = "Invalid promo code.";
      promoMessage.style.color = "red";
    }
  });

  // --- Price Update ---
  function updateTotals() {
    const quantity = parseInt(quantityValue.textContent, 10);
    const newSubtotal = pricePerItem * quantity;
    subtotalElement.textContent = `£${newSubtotal.toFixed(2)}`;
    let discountedTotal = newSubtotal;

    // Check if there's an active discount
    const savingsSection = document.getElementById("savings-section");
    if (savingsSection && savingsSection.style.display === "flex") {
      const discount = newSubtotal * 0.2;
      discountedTotal = newSubtotal - discount;
      document.getElementById("savings-price").textContent = `£${(newSubtotal - discountedTotal).toFixed(2)}`;
    }

    // Add shipping cost
    discountedTotal += shippingCost;
    totalElement.textContent = `£${discountedTotal.toFixed(2)}`;
  }

  // Initial totals calculation
  updateTotals();
});
