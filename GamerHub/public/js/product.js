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