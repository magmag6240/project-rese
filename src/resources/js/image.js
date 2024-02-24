
const image = document.getElementById("image");
const text = document.getElementById("text");
const image_past = document.getElementById("image_past");
const image_preview = document.querySelector(".image-preview");

image.addEventListener("change", updateImageDisplay);

function updateImageDisplay() {
    while (image_preview.firstChild) {
        image_preview.removeChild(image_preview.firstChild);
    }

    const curFiles = image.files;
    if (curFiles.length === 0) {
        text.style.display = 'block'
        image_past.style.display = 'none'
    } else {
        for (const file of curFiles) {
            image_past.style.display = 'none'
            text.style.display = 'none'
            const div = document.createElement("div");
            div.className = 'preview-image-div';
            image_preview.appendChild(div);
            const para = document.createElement("p");
            para.textContent = `ファイル名: ${file.name}`;
            para.className = 'preview-image-p';
            const image = document.createElement("img");
            image.width = 100;
            image.height = 100;
            image.src = URL.createObjectURL(file);
            image.className = 'preview-image-img';

            div.appendChild(image);
            div.appendChild(para);
            div.appendChild(div);
        }
    }
}