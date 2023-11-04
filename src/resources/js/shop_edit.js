
const shop_name = document.getElementById("shop_name");
const area = document.getElementById("area");
const genre = document.getElementById("genre");
const shop_detail = document.getElementById("shop_detail");
const image_url = document.getElementById("image_url");

shop_name.addEventListener("change", function () {
    const shop_name_confirm = document.getElementById("shop_name_confirm");
    shop_name_confirm.textContent = shop_name.value;
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