
const image = document.getElementById("image");
const image_preview = document.querySelector(".image-preview");

image.addEventListener("change", updateImageDisplay);

function updateImageDisplay() {
    while (image_preview.firstChild) {
        image_preview.removeChild(image_preview.firstChild);
    }

    const curFiles = image.files;
    if (curFiles.length === 0) {
        const para = document.createElement("p");
        para.textContent = "クリックして写真を追加<br>またはドラッグアンドドロップ";
        image_preview.appendChild(para);
    } else {
        for (const file of curFiles) {
            const div = document.createElement("div");
            image_preview.appendChild(div);
            const para = document.createElement("p");
            para.textContent = `ファイル名: ${file.name}`;
            const image = document.createElement("img");
            image.width = 100;
            image.height = 100;
            image.src = URL.createObjectURL(file);

            div.appendChild(image);
            div.appendChild(para);
            div.appendChild(div);
        }
    }
}