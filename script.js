document.addEventListener("DOMContentLoaded", function () {
    // Mobile Navigation Toggle
    const navToggle = document.querySelector(".nav-toggle");
    const navLinks = document.querySelector(".nav-links");

    navToggle.addEventListener("click", function () {
        navLinks.classList.toggle("active");
        navToggle.classList.toggle("open");
    });

    // Smooth Scrolling for Navigation Links
    document.querySelectorAll(".nav-links a").forEach(anchor => {
        anchor.addEventListener("click", function (event) {
            event.preventDefault();
            const targetSection = document.querySelector(this.getAttribute("href"));
            targetSection.scrollIntoView({ behavior: "smooth", block: "start" });

            // Close mobile nav on selection
            navLinks.classList.remove("active");
            navToggle.classList.remove("open");
        });
    });

    // Typing Animation for Name
    const nameElement = document.querySelector(".typing-animation");
    const nameText = "Welcome to My World !!!";
    let index = 0;

    function typeEffect() {
        nameElement.innerHTML = nameText.substring(0, index);
        index++;
        if (index <= nameText.length) {
            setTimeout(typeEffect, 150);
        }
    }
    typeEffect();

    // Form Submission Alert
    document.querySelector("#contact-form").addEventListener("submit", function (event) {
        event.preventDefault();
        alert("Your message has been sent successfully!");
        this.reset();
    });
});
