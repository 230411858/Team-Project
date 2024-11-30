// integration of emailjs
//references used

//https://stackoverflow.com/questions/75302961/where-is-the-user-id-in-my-emailjs-account
//https://stackoverflow.com/questions/74444267/why-emailjs-is-not-sending-me-emailjs-in-html-how-can-i-send-email-with-emailj

// 

document.addEventListener("DOMContentLoaded", function () {
    emailjs.init(YoqdkK7ROWf3eikUm)
});

function sendEmail(event) {
    event.preventDefault(); 
} 
//W3Schools - Clicking on a "Submit" button, prevent it from submitting a form

const formData = {
    first_name: document.getElementById("first-name").value,
    first_name: document.getElementById("last-name").value,
    first_name: document.getElementById("email").value,
    first_name: document.getElementById("message").value,
    first_name: document.getElementById("country").value,
};

emailjs
    .send("", "", formData)
    .then(
        function (response) {
            alert("Email sent successfully!")
            console.log("SUCCESS!", response.status, response.text);
            document.getElementById("contact-form").reset();

        },
        funciton (error) {
            alert("Failed to send email.");
            console.error("Failed", error)
        }
    );

    }
 