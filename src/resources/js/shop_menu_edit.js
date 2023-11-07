
const select_menu = document.getElementById("select_menu");
const name_before = document.getElementById("name_before");
const price_before = document.getElementById("price_before");
const menu_detail_before = document.getElementById("menu_detail_before");
const name_after = document.getElementById("name_after");
const price_after = document.getElementById("price_after");
const menu_detail_after = document.getElementById("menu_detail_after");

select_menu.addEventListener("change", function () {
    const name_before = document.getElementById("name_before");
    name_before.textContent = shop_name.value;
});

area.addEventListener("change", function () {
    const area_confirm = document.getElementById("area_confirm");
    area_confirm.textContent = area.options[area.selectedIndex].textContent;
});

genre.addEventListener("change", function () {
    const genre_confirm = document.getElementById("genre_confirm");
    genre_confirm.textContent = genre.options[genre.selectedIndex].textContent;
});

shop_detail.addEventListener("change", function () {
    const shop_detail_confirm = document.getElementById("shop_detail_confirm");
    shop_detail_confirm.textContent = shop_detail.value;
});

image_url.addEventListener("change", function () {
    const image_url_confirm = document.getElementById("image_url_confirm");
    image_url_confirm.textContent = image_url.value;
});