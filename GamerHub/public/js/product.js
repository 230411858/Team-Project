function updateTotal() {
    const price = parseFloat(document.getElementById('price').textContent);
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = price * quantity;
    console.log(price, quantity, total);
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

function addToCart()
{
    window.location.href = "/add/" + document.getElementById("product-id").value + "/" + document.getElementById("quantity").value;
}