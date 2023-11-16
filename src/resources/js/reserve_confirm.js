
const reserve_date = document.getElementById("reserve_date");
const start_time = document.getElementById("start_time");
const number = document.getElementById("number");
const menu = document.getElementById("menu_id");

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

menu.addEventListener("change", function () {
    const menu_confirm = document.getElementById("menu_confirm");
    menu_confirm.textContent = menu.options[menu.selectedIndex].textContent;
});