
const stars = document.getElementsByClassName("star");
const clicked = false;

for (let i = 0; i < stars.length; i++) {
    stars[i].addEventListener("click", function () {
        clicked = true;
        for (let j = 0; j <= i; j++) {
            stars[j].style.color = "#f0da61";
        }
        for (let j = i + 1; j < stars.length; j++) {
            stars[j].style.color = "#a09a9a";
        }
    });
}