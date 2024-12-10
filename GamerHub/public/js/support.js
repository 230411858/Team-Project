// Initialize EmailJS for contact form submissions
emailjs.init("l_sqHPwRue0BZ7XSc");

// Handle Contact Form Submission
document.getElementById('contact-form')?.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent page refresh on form submission

    // Collect form input values
    const form = event.target;
    const serviceID = 'service_ebhd949';
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
    const faqButton = document.getElementById("faq-button");

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
            faqButton.href = "faq.html?product=WirelessMouse";
            break;

        default:
            selectedMouseTitle.textContent = "Product Not Found";
            selectedMouseImage.src = "";
            faqButton.href = "#";
            break;
    }
}

// Reset View to Product Selection
function showProductSection() {
    // Show product selection and hide category section
    document.getElementById("product-section").classList.remove("hidden");
    document.getElementById("category-section").classList.add("hidden");
}

// Update product information when selecting a series
document.getElementById("product-series")?.addEventListener("change", (event) => {
    const selectedProduct = event.target.value;
    const selectedMouseImage = document.getElementById("selected-mouse-image");
    const selectedMouseTitle = document.getElementById("selected-mouse-title");
    const faqButton = document.getElementById("faq-button");

    const productData = {
        Wireless: {
            image: "images/products/mice/WirelessMouse(1).png",
            title: "Wireless Mouse",
            faqLink: "faq.html?product=WirelessMouse",
        },
        Wired: {
            image: "images/products/mice/WiredMouse(1).png",
            title: "Wired Mouse",
            faqLink: "faq.html?product=WiredMouse",
        },
        Ergonomic: {
            image: "images/products/mice/ErgonomicMice(1).png",
            title: "Ergonomic Mouse",
            faqLink: "faq.html?product=ErgonomicMouse",
        },
        Stylus: {
            image: "images/products/mice/StylusPen(1).png",
            title: "Stylus Pen",
            faqLink: "faq.html?product=StylusPen",
        },
        Gaming: {
            image: "images/products/mice/GamingMice(1).png",
            title: "Gaming Mouse",
            faqLink: "faq.html?product=GamingMouse",
        },
    };

    const product = productData[selectedProduct];

    if (product) {
        selectedMouseImage.src = product.image;
        selectedMouseImage.onerror = () => {
            // Fallback to a placeholder image if the specified image is missing
            selectedMouseImage.src = "images/products/mice/placeholder.png";
        };
        selectedMouseTitle.textContent = product.title;
        faqButton.href = product.faqLink;
    } else {
        selectedMouseImage.src = "images/products/mice/placeholder.png";
        selectedMouseTitle.textContent = "Product Not Found";
        faqButton.href = "#";
    }
});


// FAQ Toggle Logic
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqAnswer = question.nextElementSibling;

        // Collapse other answers
        document.querySelectorAll('.faq-answer').forEach(answer => {
            if (answer !== faqAnswer) answer.style.display = 'none';
        });

        // Toggle the selected FAQ answer
        faqAnswer.style.display = faqAnswer.style.display === 'block' ? 'none' : 'block';
    });
});