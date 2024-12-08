const filterButtons = document.querySelectorAll(".filtersection button");
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

filterButtons.forEach(button => button.addEventListener("click", filterProducts));