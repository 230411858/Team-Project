const categoryButtons = document.querySelectorAll(".category button");
const priceButtons = document.querySelectorAll(".price button");
const filterableProducts = document.querySelectorAll(".productcontainer .products");

const filterProducts = () => {
    let selectedCategory = document.querySelector(".category .active").dataset.name || "all";
    let selectedPriceRange = document.querySelector(".price .active").dataset.price || "all";

    filterableProducts.forEach(product => {
        let productCategory = product.dataset.name;
        let productPrice = parseFloat(product.dataset.price);

        let matchesCategory = (selectedCategory === "all" || productCategory === selectedCategory);
        let matchesPrice = false;

        if (selectedPriceRange === "all") {
            matchesPrice = true;
        } else {
            let [minPrice, maxPrice] = selectedPriceRange.split("-").map(Number);
            if (!maxPrice) {
                // Case for "80+" (no max range)
                matchesPrice = productPrice >= minPrice;
            } else {
                matchesPrice = productPrice >= minPrice && productPrice <= maxPrice;
            }
        }

        // Only show products that match both category and price
        product.classList.toggle("hide", !(matchesCategory && matchesPrice));
    });
};


categoryButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        document.querySelector(".category .active")?.classList.remove("active");
        e.target.classList.add("active");
        filterProducts(); // Apply both filters
    });
});

priceButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        document.querySelector(".price .active")?.classList.remove("active");
        e.target.classList.add("active");
        filterProducts(); // Apply both filters
    });
});