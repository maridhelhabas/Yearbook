const passInput = document.getElementById("password");
const showPassButton = document.getElementById("password1");
const eyeIcon = document.getElementById("eye-icon");

showPassButton.addEventListener("click", () => {
    if (passInput.type === "password") {
        passInput.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
});