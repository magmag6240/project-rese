
const user_checkbox = document.getElementById("checkbox");

user_checkbox.addEventListener("change", function () {
    const user_email = document.getElementById("email");
    email.textContent = user_email.value;
});