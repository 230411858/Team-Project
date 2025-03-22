
// Selecting all elements inside each cateogory
const categoryButtons = document.querySelectorAll(".category button");
const priceButtons = document.querySelectorAll(".price button");
const filterableProducts = document.querySelectorAll(".productcontainer .products");


// Filter Function
const filterProducts = () => {
    // Getting selected filters - category & price
    let selectedCategory = document.querySelector(".category .active").dataset.name || "all";
    let selectedPriceRange = document.querySelector(".price .active").dataset.price || "all";

    // Loop through each product to check if it the product is the correctly selected one
    filterableProducts.forEach(product => {
        let productCategory = product.dataset.name;
        let productPrice = parseFloat(product.dataset.price);

        // Check if product matches selected category
        let matchesCategory = (selectedCategory === "all" || productCategory === selectedCategory);
        let matchesPrice = false;

        if (selectedPriceRange === "all") {
            matchesPrice = true;
        } else {
            let [minPrice, maxPrice] = selectedPriceRange.split("-").map(Number);
            if (!maxPrice) {
                matchesPrice = productPrice >= minPrice;
            } else {
                matchesPrice = productPrice >= minPrice && productPrice <= maxPrice;
            }
        }

        // Hides product depending on if the product matches the selected category
        product.classList.toggle("hide", !(matchesCategory && matchesPrice));
    });
};

// Changes active class for category to the selected button
categoryButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        document.querySelector(".category .active")?.classList.remove("active");
        e.target.classList.add("active");
        filterProducts();
    });
});

// Changes active class for price to the selected button
priceButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        document.querySelector(".price .active")?.classList.remove("active");
        e.target.classList.add("active");
        filterProducts(); 
    });
});