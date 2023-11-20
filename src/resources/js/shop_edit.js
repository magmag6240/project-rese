
const shop_name = document.getElementById("shop_name");
const prefecture_id = document.getElementById("prefecture_id");
const genre_id = document.getElementById("genre_id");
const shop_detail = document.getElementById("shop_detail");
const image_url = document.getElementById("image_url");

shop_name.addEventListener("change", function () {
    const shop_name_confirm = document.getElementById("shop_name_confirm");
    shop_name_confirm.textContent = shop_name.value;
});

prefecture_id.addEventListener("change", function () {
    const prefecture_id_confirm = document.getElementById("prefecture_id_confirm");
    prefecture_id_confirm.textContent = prefecture_id.options[prefecture_id.selectedIndex].textContent;
});

genre_id.addEventListener("change", function () {
    const genre_id_confirm = document.getElementById("genre_id_confirm");
    genre_id_confirm.textContent = genre_id.options[genre_id.selectedIndex].textContent;
});

shop_detail.addEventListener("change", function () {
    const shop_detail_confirm = document.getElementById("shop_detail_confirm");
    shop_detail_confirm.textContent = shop_detail.value;
});

image_url.addEventListener("change", function () {
    const image_url_confirm = document.getElementById("image_url_confirm");
    image_url_confirm.textContent = image_url.value;
});