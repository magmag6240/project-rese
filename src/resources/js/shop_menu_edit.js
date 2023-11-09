
const shop_name = document.getElementById("menu_name");
const shop_detail = document.getElementById("menu_detail");
const image_url = document.getElementById("price");

shop_name.addEventListener("change", function () {
    const menu_name_confirm = document.getElementById("menu_name_confirm");
    menu_name_confirm.textContent = menu_name.value;
});

shop_detail.addEventListener("change", function () {
    const menu_detail_confirm = document.getElementById("menu_detail_confirm");
    menu_detail_confirm.textContent = menu_detail.value;
});

price.addEventListener("change", function () {
    const price_confirm = document.getElementById("price_confirm");
    price_confirm.textContent = price.value;
});