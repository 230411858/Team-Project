/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) => {
  const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId);

  toggle.addEventListener("click", () => {
    // Add show-menu class to nav menu
    nav.classList.toggle("show-menu");
    // Add show-icon to show and hide menu icon
    toggle.classList.toggle("show-icon");
  });
};

showMenu("nav-toggle", "nav-menu");

/*=============== SHOW DROPDOWN MENU ===============*/
const dropdownItems = document.querySelectorAll(".dropdown__item");

// 1. Select each dropdown item
dropdownItems.forEach((item) => {
  const dropdownButton = item.querySelector(".dropdown__button");

  // 2. Select each button click
  dropdownButton.addEventListener("click", () => {
    // 7. Select the current show-dropdown class
    const showDropdown = document.querySelector(".show-dropdown");

    // 5. Call the toggleItem function
    toggleItem(item);

    // 8. Remove the show-dropdown class from other items
    if (showDropdown && showDropdown !== item) {
      toggleItem(showDropdown);
    }
  });
});

// 3. Create a function to display the dropdown
const toggleItem = (item) => {
  // 3.1. Select each dropdown content
  const dropdownContainer = item.querySelector(".dropdown__container");

  // 6. If the same item contains the show-dropdown class, remove
  if (item.classList.contains("show-dropdown")) {
    dropdownContainer.removeAttribute("style");
    item.classList.remove("show-dropdown");
  } else {
    // 4. Add the maximum height to the dropdown content and add the show-dropdown class
    dropdownContainer.style.height = dropdownContainer.scrollHeight + "px";
    item.classList.add("show-dropdown");
  }
};

/*=============== DELETE DROPDOWN STYLES ===============*/
const mediaQuery = matchMedia("(min-width: 1118px)"),
  dropdownContainer = document.querySelectorAll(".dropdown__container");

// Function to remove dropdown styles in mobile mode when browser resizes
const removeStyle = () => {
  // Validate if the media query reaches 1118px
  if (mediaQuery.matches) {
    // Remove the dropdown container height style
    dropdownContainer.forEach((e) => {
      e.removeAttribute("style");
    });

    // Remove the show-dropdown class from dropdown item
    dropdownItems.forEach((e) => {
      e.classList.remove("show-dropdown");
    });
  }
};

addEventListener("resize", removeStyle);

/*=============== DARKMODE ===============*/

let darkmode = localStorage.getItem("darkmode");
const switchButton = document.getElementById("switch");
const myImg = document.getElementById("myImg");

// Enable dark mode
const enableDarkmode = () => {
  document.body.classList.add("darkmode");
  localStorage.setItem("darkmode", "active");
  myImg.src = "image/Logo_White.png"; // Change image for dark mode
  localStorage.setItem("imageState", "dark");
};

// Disable dark mode
const disableDarkmode = () => {
  document.body.classList.remove("darkmode");
  localStorage.setItem("darkmode", "inactive");
  myImg.src = "image/logo.png"; // Change image for light mode
  localStorage.setItem("imageState", "light");
};

// Check stored mode on page load
if (darkmode === "active") {
  enableDarkmode();
} else {
  disableDarkmode();
}

// Add event listener for the button
switchButton.addEventListener("click", () => {
  darkmode = localStorage.getItem("darkmode");
  darkmode !== "active" ? enableDarkmode() : disableDarkmode();
});

// Restore image state on page load
const savedImageState = localStorage.getItem("imageState");
if (savedImageState === "dark") {
  myImg.src = "image/Logo_White.png";
} else {
  myImg.src = "image/logo.png";
}

const menuBtn = document.querySelector(".menu-icon span");
const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const form = document.querySelector("form");

menuBtn.onclick = () => {
  items.classList.add("active");
  menuBtn.classList.add("hide");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
};
cancelBtn.onclick = () => {
  items.classList.remove("active");
  menuBtn.classList.remove("hide");
  searchBtn.classList.remove("hide");
  cancelBtn.classList.remove("show");
  form.classList.remove("active");
  cancelBtn.style.color = "#hsl(220, 68%, 54%)";
};
searchBtn.onclick = () => {
  form.classList.add("active");
  searchBtn.classList.add("hide");
  cancelBtn.classList.add("show");
};

var countDownDate = new Date("Apr 20, 2025 00:00:00").getTime();
var x = setInterval(function () {
  var now = new Date().getTime();
  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML = seconds;
}, 1000);

// Add to Cart (for Countdown Section)
const countdownAddToCartButton = document.querySelector(".countdown .btn-cart");
countdownAddToCartButton.addEventListener("click", () => {
  const productImgSrc = document.querySelector(".countdown_container img").src;
  const productTitle = "Limited Time Offer - 50% Off";
  const productPrice = "$75.00"; // Discounted price

  addToCartFromCountdown(productImgSrc, productTitle, productPrice);
});

// Load cart from localStorage when page loads
document.addEventListener("DOMContentLoaded", loadCart);

// Function to save cart to localStorage
const saveCart = () => {
  const cartItems = [];
  const cartBoxes = cartContent.querySelectorAll(".cart-box");

  cartBoxes.forEach((cartBox) => {
    const imgSrc = cartBox.querySelector(".cart-img").src;
    const title = cartBox.querySelector(".cart-product-title").textContent;
    const price = cartBox.querySelector(".cart-price").textContent;
    const quantity = cartBox.querySelector(".quantity-number").textContent;

    cartItems.push({
      imgSrc,
      title,
      price,
      quantity,
    });
  });

  localStorage.setItem("cart", JSON.stringify(cartItems));
};

// Function to load cart from localStorage
function loadCart() {
  const savedCart = localStorage.getItem("cart");
  if (savedCart) {
    const cartItems = JSON.parse(savedCart);

    // Clear current cart count
    cartItemCount = 0;

    // Add each saved item to the cart
    cartItems.forEach((item) => {
      const cartBox = document.createElement("div");
      cartBox.classList.add("cart-box");
      cartBox.innerHTML = `
        <img src="${item.imgSrc}" class="cart-img">
        <div class="cart-detail">
            <h2 class="cart-product-title">${item.title}</h2>
            <span class="cart-price">${item.price}</span>
            <div class="cart-quantity">
                <button id="decrease">-</button>
                <span class="quantity-number">${item.quantity}</span>
                <button id="increase">+</button>
            </div>
        </div>
        <i class="ri-delete-bin-line cart-remove"></i>
      `;

      cartContent.appendChild(cartBox);

      // Add event listeners to the newly created elements
      cartBox.querySelector(".cart-remove").addEventListener("click", () => {
        cartBox.remove();
        updateCartCount(-1);
        updateTotalPrice();
        saveCart();
      });

      cartBox
        .querySelector(".cart-quantity")
        .addEventListener("click", (event) => {
          const quantityElement = cartBox.querySelector(".quantity-number");
          const decreaseButton = cartBox.querySelector("#decrease");
          let quantity = parseInt(quantityElement.textContent);

          if (event.target.id === "decrease" && quantity > 1) {
            quantity--;
            if (quantity === 1) {
              decreaseButton.style.color = "#999";
            }
          } else if (event.target.id === "increase") {
            quantity++;
            decreaseButton.style.color = "#333";
          }

          quantityElement.textContent = quantity;
          updateTotalPrice();
          saveCart();
        });

      // Update cart count
      updateCartCount(1);
    });

    // Update total price after loading all items
    updateTotalPrice();
  }
}

const addToCartFromCountdown = (imgSrc, title, price) => {
  const cartContent = document.querySelector(".cart-content");

  // Check if item is already in cart
  const cartItems = cartContent.querySelectorAll(".cart-product-title");
  for (let item of cartItems) {
    if (item.textContent === title) {
      alert("This item is already in the cart.");
      return;
    }
  }

  // Create cart item
  const cartBox = document.createElement("div");
  cartBox.classList.add("cart-box");
  cartBox.innerHTML = `
        <img src="${imgSrc}" class="cart-img">
        <div class="cart-detail">
            <h2 class="cart-product-title">${title}</h2>
            <span class="cart-price">${price}</span>
            <div class="cart-quantity">
                <button id="decrease">-</button>
                <span class="quantity-number">1</span>
                <button id="increase">+</button>
            </div>
        </div>
        <i class="ri-delete-bin-line cart-remove"></i>
    `;

  cartContent.appendChild(cartBox);

  // Remove item from cart
  cartBox.querySelector(".cart-remove").addEventListener("click", () => {
    cartBox.remove();
    updateCartCount(-1);
    updateTotalPrice();
    saveCart();
  });

  // Quantity control
  cartBox.querySelector(".cart-quantity").addEventListener("click", (event) => {
    const quantityElement = cartBox.querySelector(".quantity-number");
    const decreaseButton = cartBox.querySelector("#decrease");
    let quantity = parseInt(quantityElement.textContent);

    if (event.target.id === "decrease" && quantity > 1) {
      quantity--;
      if (quantity === 1) {
        decreaseButton.style.color = "#999";
      }
    } else if (event.target.id === "increase") {
      quantity++;
      decreaseButton.style.color = "#333";
    }

    quantityElement.textContent = quantity;
    updateTotalPrice();
    saveCart();
  });

  updateCartCount(1);
  updateTotalPrice();
  saveCart();
};

const cartIcon = document.querySelector(".nav_basket");
const cart = document.querySelector(".cart");
const cartClose = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => cart.classList.add("active"));
cartClose.addEventListener("click", () => cart.classList.remove("active"));

const addCartButtons = document.querySelectorAll(".btn-cart");
addCartButtons.forEach((button) => {
  if (!button.closest(".countdown")) {
    // Skip countdown button as it's handled separately
    button.addEventListener("click", (event) => {
      const productElement = event.target.closest(".product");
      if (productElement) {
        addToCart(productElement);
      }
    });
  }
});

const cartContent = document.querySelector(".cart-content");

const addToCart = (productElement) => {
  const productImgSrc = productElement.querySelector("img").src;
  const productTitle =
    productElement.querySelector(".product-name").textContent;
  const productPrice =
    productElement.querySelectorAll(".product-price")[1]?.textContent ||
    productElement.querySelector(".product-price").textContent;

  const cartItems = cartContent.querySelectorAll(".cart-product-title");
  for (let item of cartItems) {
    if (item.textContent === productTitle) {
      alert("This item is already in the cart.");
      return;
    }
  }

  const cartBox = document.createElement("div");
  cartBox.classList.add("cart-box");
  cartBox.innerHTML = `
          <img src="${productImgSrc}" class="cart-img">
          <div class="cart-detail">
              <h2 class="cart-product-title">${productTitle}</h2>
              <span class="cart-price">${productPrice}</span>
              <div class="cart-quantity">
                  <button id="decrease">-</button>
                  <span class="quantity-number">1</span>
                  <button id="increase">+</button>
              </div>
          </div>
          <i class="ri-delete-bin-line cart-remove"></i>
      `;

  cartContent.appendChild(cartBox);

  cartBox.querySelector(".cart-remove").addEventListener("click", () => {
    cartBox.remove();
    updateCartCount(-1);
    updateTotalPrice();
    saveCart();
  });

  cartBox.querySelector(".cart-quantity").addEventListener("click", (event) => {
    const quantityElement = cartBox.querySelector(".quantity-number");
    const decreaseButton = cartBox.querySelector("#decrease");
    let quantity = parseInt(quantityElement.textContent);

    if (event.target.id === "decrease" && quantity > 1) {
      quantity--;
      if (quantity === 1) {
        decreaseButton.style.color = "#999";
      }
    } else if (event.target.id === "increase") {
      quantity++;
      decreaseButton.style.color = "#333";
    }

    quantityElement.textContent = quantity;
    updateTotalPrice();
    saveCart();
  });

  updateCartCount(1);
  updateTotalPrice();
  saveCart();
};

const updateTotalPrice = () => {
  const totalPriceElement = document.querySelector(".total-price");
  const cartBoxes = cartContent.querySelectorAll(".cart-box");
  let total = 0;
  cartBoxes.forEach((cartBox) => {
    const priceElement = cartBox.querySelector(".cart-price");
    const quantityElement = cartBox.querySelector(".quantity-number");
    const price = parseFloat(priceElement.textContent.replace("$", ""));
    const quantity = parseInt(quantityElement.textContent);
    total += price * quantity;
  });
  totalPriceElement.textContent = `$${total.toFixed(2)}`;
};

let cartItemCount = 0;
const updateCartCount = (change) => {
  const cartItemCountBadge = document.querySelector(".basket-count");
  cartItemCount += change;
  if (cartItemCount > 0) {
    cartItemCountBadge.style.visibility = "visible";
    cartItemCountBadge.textContent = cartItemCount;
  } else {
    cartItemCountBadge.style.visibility = "hidden";
    cartItemCountBadge.textContent = "";
  }
};

const buyNowButton = document.querySelector(".btn-buy");
buyNowButton.addEventListener("click", () => {
  const cartBoxes = cartContent.querySelectorAll(".cart-box");
  if (cartBoxes.length === 0) {
    alert("Your cart is empty. Please add items to your cart before buying.");
    return;
  }

  cartBoxes.forEach((cartBox) => cartBox.remove());

  cartItemCount = 0;
  updateCartCount(0);
  updateTotalPrice();

  // Clear localStorage after purchase
  localStorage.removeItem("cart");

  alert("Thank you for your purchase!");
});
