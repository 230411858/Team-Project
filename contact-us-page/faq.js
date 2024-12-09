// Wait until the DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Extract the product name from the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const product = urlParams.get("product");

    // Select elements where content will be updated
    const titleElement = document.getElementById("product-title");
    const imageElement = document.getElementById("product-image");
    const faqListElement = document.getElementById("faq-list");

    // FAQ data for each product
    const faqs = {
        WirelessMouse: [
            { question: "How to connect a wireless mouse?", answer: "Use the USB receiver or Bluetooth pairing." },
            { question: "What is the battery life?", answer: "Up to 12 months on a single charge." },
            { question: "Does it work with macOS?", answer: "Yes, compatible with macOS 10.10 and later." },
        ],
        WiredMouse: [
            { question: "Is it plug-and-play?", answer: "Yes, simply plug it into your USB port." },
            { question: "What is the cable length?", answer: "The cable is 1.5 meters long." },
            { question: "How to clean the mouse?", answer: "Use a soft cloth and avoid water." },
        ],
        ErgonomicMouse: [
            { question: "What makes it ergonomic?", answer: "Reduces wrist strain with a vertical design." },
            { question: "Can I reprogram the buttons?", answer: "Yes, using the included software." },
            { question: "Does it work with Linux?", answer: "Yes, compatible with most Linux distributions." },
        ],
        StylusMouse: [
            { question: "How to use a stylus mouse?", answer: "Use it like a pen on a compatible surface." },
            { question: "Can it work on any surface?", answer: "No, it requires a stylus-compatible surface." },
            { question: "How to replace the stylus tip?", answer: "Unscrew the tip and replace it." },
        ],
        GamingMouse: [
            { question: "What DPI levels does it support?", answer: "It supports up to 16,000 DPI." },
            { question: "Is it RGB customizable?", answer: "Yes, through the included software." },
            { question: "Does it work on consoles?", answer: "Yes, compatible with Xbox and PS5 for supported games." },
        ],
    };

    // Check if a valid product was passed in the URL
    if (product && faqs[product]) {
        // Update the product title by formatting the product name
        titleElement.textContent = product.replace(/([A-Z])/g, " $1").trim();

        // Update the product image with the corresponding file
        imageElement.src = `images/products/mice/${product}(1).png`;
        imageElement.alt = `${product} Image`;

        // Generate the FAQ list dynamically
        faqListElement.innerHTML = faqs[product]
            .map(
                (faq) => `
            <div class="faq-item">
              <button class="faq-question">${faq.question}</button>
              <div class="faq-answer">${faq.answer}</div>
            </div>
          `
            )
            .join("");
    } else {
        // Handle invalid product or missing FAQs
        titleElement.textContent = "Product not found.";
        imageElement.src = ""; // Use a placeholder or blank image
        imageElement.alt = "Product Image Placeholder";
        faqListElement.innerHTML = "<p>No FAQs available for this product.</p>";
    }

    // Add click event listeners to each FAQ question
    document.querySelectorAll(".faq-question").forEach((button) => {
        button.addEventListener("click", () => {
            const answer = button.nextElementSibling;

            // Toggle the visibility of the clicked FAQ answer
            answer.style.display = answer.style.display === "block" ? "none" : "block";
        });
    });
});
