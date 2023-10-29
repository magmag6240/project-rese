
const reserve_date = document.getElementById("reserve_date");
const start_time = document.getElementById("start_time");
const number = document.getElementById("number");

reserve_date.addEventListener("change", function () {
    const reserve_date_confirm = document.getElementById("reserve_date_confirm");
    reserve_date_confirm.textContent = reserve_date.value;
});

start_time.addEventListener("change", function () {
    const start_time_confirm = document.getElementById("start_time_confirm");
    start_time_confirm.textContent = start_time.options[start_time.selectedIndex].textContent;
});

number.addEventListener("change", function () {
    const number_confirm = document.getElementById("number_confirm");
    number_confirm.textContent = number.options[number.selectedIndex].textContent;
});