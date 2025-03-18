/*Implemented by Isa Abdur-Rahman*/

//Filter Section by Category//
const filterbyCategory = document.querySelectorAll(".category button");
const filterPriceButtons = document.querySelectorAll(".price button");

const filterableProducts = document.querySelectorAll(".productcontainer .products");

const filterProducts = e => {
    document.querySelector(".active").classList.remove("active");
    e.target.classList.add("active");

filterableProducts.forEach(products =>{
    products.classList.add("hide");
    if (products.dataset.name === e.target.dataset.name || e.target.dataset.name === "all"){
        products.classList.remove("hide");
    }
});
}

filterbyCategory.forEach(button => button.addEventListener("click", filterProducts));


//FilterSection by Price//

const priceFilterButtons = document.querySelectorAll(".price button");

const filterByPrice = (e) => {
    document.querySelector(".price .active")?.classList.remove("active");
    e.target.classList.add("active");

    let selectedPriceRange = e.target.dataset.price;
    let productsArray = Array.from(filterableProducts); // Convert NodeList to Array

    let filteredProducts = productsArray.filter(product => {
        let productPrice = parseFloat(product.dataset.price);

        if (selectedPriceRange === "all") return true; // Show all products

        let [minPrice, maxPrice] = selectedPriceRange.split("-").map(Number);
        if (!maxPrice) {
            // Case for "80+" (no upper limit)
            return productPrice >= minPrice;
        } else {
            return productPrice >= minPrice && productPrice <= maxPrice;
        }
    });

    // **Sorting products by price (Ascending Order)**
    filteredProducts.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));

    // **Rearrange products in the DOM**
    let productContainer = document.querySelector(".productcontainer");
    productContainer.innerHTML = ""; // Clear existing products

    filteredProducts.forEach(product => {
        product.classList.remove("hide"); // Ensure they are visible
        productContainer.appendChild(product); // Re-add in sorted order
    });
};

// ✅ Update event listeners for price filter buttons
priceFilterButtons.forEach(button => button.addEventListener("click", filterByPrice));