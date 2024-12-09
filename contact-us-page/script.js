// Initialize EmailJS for contact form submissions
//https://stackoverflow.com/questions/58791656/send-email-directly-from-javascript-using-emailjs
emailjs.init("l_sqHPwRue0BZ7XSc"); 

// Handle Contact Form Submission
document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent page refresh on form submission

    // Collect form input values
    const form = event.target;
    const serviceID = 'service_ebhd949'; /
    const templateID = 'template_8mq346a'; 

    const params = {
        from_name: form['from-name'].value,
        from_email: form['from-email'].value,
        country: form['country'].value,
        message: form['message'].value,
    };

    // Update submit button to indicate loading
    const submitButton = document.querySelector('.submit-btn');
    submitButton.textContent = 'Sending...';
    submitButton.disabled = true;

    // Send email using EmailJS
    emailjs.send(serviceID, templateID, params)
        .then(() => {
            // Success feedback to the user
            alert('Message sent successfully!');
            form.reset(); // Clear form fields after submission
        })
        .catch((error) => {
            // Error feedback in case of failure
            console.error('EmailJS Error:', error);
            alert('Failed to send the message. Please try again later.');
        })
        .finally(() => {
            // Reset button state
            submitButton.textContent = 'Send Message';
            submitButton.disabled = false;
        });
});

// Show Product Category Section
function showCategory(categoryName) {
    // Hide the product selection section
    document.getElementById("product-section").classList.add("hidden");
    
    // Show the selected category section
    document.getElementById("category-section").classList.remove("hidden");

    // Update Category Section Details
    const categoryTitle = document.getElementById("category-title");
    const productSeriesSelect = document.getElementById("product-series");
    const selectedMouseImage = document.getElementById("selected-mouse-image");
    const selectedMouseTitle = document.getElementById("selected-mouse-title");

    categoryTitle.textContent = `${categoryName} Support and Services`;

    // Populate Category Based on Selection
    switch (categoryName.toLowerCase()) {
        case "mice":
            productSeriesSelect.innerHTML = `
                <option value="Wireless">Wireless</option>
                <option value="Wired">Wired</option>
                <option value="Ergonomic">Ergonomic</option>
                <option value="Stylus">Stylus</option>
                <option value="Gaming">Gaming</option>
            `;
            selectedMouseImage.src = "images/products/mice/WirelessMouse(1).png";
            selectedMouseTitle.textContent = "Wireless Mouse";
            break;

        default:
            selectedMouseTitle.textContent = "Product Not Found";
            break;
    }
}

// Reset View to Product Selection
function showProductSection() {
    // Show product selection and hide category section
    document.getElementById("product-section").classList.remove("hidden");
    document.getElementById("category-section").classList.add("hidden");
}

// FAQ Toggle Logic
const faqQuestions = document.querySelectorAll('.faq-question');

faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
        const faqAnswer = question.nextElementSibling;

        // Toggle visibility of the answer section
        faqAnswer.style.display = faqAnswer.style.display === 'block' ? 'none' : 'block';
    });
});
