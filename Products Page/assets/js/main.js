/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
   const toggle = document.getElementById(toggleId),
         nav = document.getElementById(navId)

   toggle.addEventListener('click', () =>{
       // Add show-menu class to nav menu
       nav.classList.toggle('show-menu')
       // Add show-icon to show and hide menu icon
       toggle.classList.toggle('show-icon')
   })
}

showMenu('nav-toggle','nav-menu')

/*=============== SHOW DROPDOWN MENU ===============*/
const dropdownItems = document.querySelectorAll('.dropdown__item')

// 1. Select each dropdown item
dropdownItems.forEach((item) =>{
    const dropdownButton = item.querySelector('.dropdown__button') 

    // 2. Select each button click
    dropdownButton.addEventListener('click', () =>{
        // 7. Select the current show-dropdown class
        const showDropdown = document.querySelector('.show-dropdown')
        
        // 5. Call the toggleItem function
        toggleItem(item)

        // 8. Remove the show-dropdown class from other items
        if(showDropdown && showDropdown!== item){
            toggleItem(showDropdown)
        }
    })
})

// 3. Create a function to display the dropdown
const toggleItem = (item) =>{
    // 3.1. Select each dropdown content
    const dropdownContainer = item.querySelector('.dropdown__container')

    // 6. If the same item contains the show-dropdown class, remove
    if(item.classList.contains('show-dropdown')){
        dropdownContainer.removeAttribute('style')
        item.classList.remove('show-dropdown')
    } else{
        // 4. Add the maximum height to the dropdown content and add the show-dropdown class
        dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
        item.classList.add('show-dropdown')
    }
}

/*=============== DELETE DROPDOWN STYLES ===============*/
const mediaQuery = matchMedia('(min-width: 1118px)'),
      dropdownContainer = document.querySelectorAll('.dropdown__container')

// Function to remove dropdown styles in mobile mode when browser resizes
const removeStyle = () =>{
    // Validate if the media query reaches 1118px
    if(mediaQuery.matches){
        // Remove the dropdown container height style
        dropdownContainer.forEach((e) =>{
            e.removeAttribute('style')
        })

        // Remove the show-dropdown class from dropdown item
        dropdownItems.forEach((e) =>{
            e.classList.remove('show-dropdown')
        })
    }
}

addEventListener('resize', removeStyle)

//Basket stuff
const basketButton = document.querySelector('.nav_basket');
const basketModal = document.querySelector('#basket-modal');
const basketItemsContainer = document.querySelector('.basket-items');
const totalPriceElement = document.querySelector('.total-price');
let basketItems = [];

basketButton.addEventListener('click', () => {
    basketModal.classList.toggle('show-basket');
});

const addToBasket = () => {
const productName = document.querySelector('.name-p').textContent; 
const productPrice = parseFloat(document.querySelector('#price').textContent);
const quantity = parseInt(document.querySelector('#quantity').value);
const totalItemPrice = productPrice * quantity;
// get details of product

const item = {
    name: productName,
    price: totalItemPrice,
    quantity: quantity
};
//create object

basketItems.push(item);
// add to basket

updateBasketUI();
//update

document.querySelector('.basket-count').textContent = basketItems.length;
};
//supposed to update counter but doesnt work on full screen

const basketCount = basketItems.length;
const basketCountElement = document.querySelector('.basket-count');
//getting the count     


const updateBasketUI = () => {
    basketItemsContainer.innerHTML = '';
    let totalPrice = 0;
//update basket inteface

basketItems.forEach((item, index) => {
totalPrice += item.price;
// loop for items in bask

basketItemsContainer.innerHTML += `
    <li class="basket-item">
    <span>${item.name} (x${item.quantity})</span>
    <span>£${item.price.toFixed(2)}</span>
    <button class="remove-item" data-index="${index}">Remove</button>
    </li>
`;
});
//add name, quan, price and remove button


    totalPriceElement.textContent = `£${totalPrice.toFixed(2)}`;
    document.querySelector('.basket-count').textContent = basketItems.length;
};
// update total cost


basketItemsContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-item')) {
        const index = e.target.dataset.index;
        basketItems.splice(index, 1);
        updateBasketUI();
    }
});
//removing item from cart


document.querySelector('.cart-butt').addEventListener('click', addToBasket);
//add to cart listener

document.querySelector('.checkout-btn').addEventListener('click', () => {
    window.location.href = '/Team-Project/Checkout Page/index.html';
});
//checkout listener and link


function changeImage(imageSrc) {
    document.getElementById('Mainpicture').src = imageSrc;
}  
//get the main pic id

function updateTotal() {
    const price = parseFloat(document.getElementById('price').textContent);
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = price * quantity;
    document.getElementById('total').textContent = total.toFixed(2);
}
// update the price when quantity increases  

var coll = document.getElementsByClassName("spec-det");
var i;
    
for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
if (content.style.display === "block") {
  content.style.display = "none";
} else {
  content.style.display = "block";
}
});
}
// for loop for the pressing of the specification button

var coll = document.getElementsByClassName("compat-js");
var i;
    
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
if (content.style.display === "block") {
    content.style.display = "none";
} else {
    content.style.display = "block";
}
});
}
// for loop for the compatibility button
  
function addReview() {
    const reviewText = document.getElementById("review-text").value;
    const reviewerName = document.getElementById("reviewer-name").value;
// get the 2 boxes details for the review

if (reviewText && reviewerName) {
    const newReview = document.createElement("div");
    newReview.classList.add("review-item");
    newReview.innerHTML = `
    <strong>${reviewerName}</strong>
    <p>${reviewText}</p>
`;
//using backticks to shorten code
// if the 2 boxes are filled create a box with the review

const reviewsList = document.getElementById("reviews-list");
    const noReviewsMessage = document.getElementById("no-reviews-message");
if (noReviewsMessage) {
    noReviewsMessage.style.display = "none";  
}
    reviewsList.appendChild(newReview);
    document.getElementById("review-text").value = "";
    document.getElementById("reviewer-name").value = "";
} else {
    alert("Fill in both fields before submitting the review.");
}
}
// if boxes are empty throw error saying fill in fields

// review

const imageElement = document.getElementById('Mainpicture');
imageElement.addEventListener('click', function() {
    imageElement.classList.toggle('zoomed');
});

//zoom

/*=============== DARKMODE ===============*/

let darkmode = localStorage.getItem('darkmode')
const Switch = document. getElementById('switch')

const enableDarkode = () =>{
    document.body.classList.add('darkmode')
    localStorage.setItem('darkmode','active')
}

const diableDarkmode = () => {
    document.body.classList.remove('darkmode')
    localStorage.setItem('darkmode', null)
}

if(darkmode === "active") enableDarkode()

Switch.addEventListener("click", () =>{
    darkmode = localStorage.getItem('darkmode')
    darkmode !== "active" ? enableDarkode() : diableDarkmode()
})


// rating system

let selectedRating = 0;
        
document.querySelectorAll('.star').forEach((star, index, stars) => {
    star.addEventListener('click', () => {
        selectedRating = index + 1;
        stars.forEach((s, i) => s.innerHTML = i < selectedRating ? "&#9733;" : "&#9734;");
    });
});

function addReview() {
    const reviewText = document.getElementById('review-text').value.trim();
    const reviewerName = document.getElementById('reviewer-name').value.trim();
    if (!reviewText || !reviewerName || !selectedRating) {
        return alert("Please provide a rating, name, and review.");
    }
    document.getElementById('reviews-list').innerHTML += `<div><strong>${reviewerName}</strong> (${selectedRating} stars) <br> ${reviewText} <hr></div>`;
    document.getElementById('review-text').value = '';
    document.getElementById('reviewer-name').value = '';
    selectedRating = 0;
    document.querySelectorAll('.star').forEach(s => s.innerHTML = "&#9734;");
}
