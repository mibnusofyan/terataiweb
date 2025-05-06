document.addEventListener("DOMContentLoaded", function () {
    // Get references to the toggle button and the navbar collapse element
    const toggleButton = document.querySelector('[data-bs-toggle="collapse"]');
    const navbarCollapse = document.getElementById("navbarCollapse");

    if (toggleButton && navbarCollapse) {
        toggleButton.addEventListener("click", function () {
            navbarCollapse.classList.toggle("hidden");
        });
    }
});
