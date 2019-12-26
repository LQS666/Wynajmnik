let selectedFiles = "";
let storedFiles = [];

$(document).ready(function () {
    $("#files").on("change", handleFileSelect);
    selectedFiles = $("#selectedFiles");
    $("body").on("click", ".selFile", removeFile);
});

function handleFileSelect(e) {
    let files = e.target.files;
    let filesArr = Array.prototype.slice.call(files);
    const container = document.querySelector(".uploadContainer"),
        text = document.querySelector(".uploadText p"),
        image = document.querySelector(".uploadText img");
    filesArr.forEach(function (f) {
        if (!f.type.match("image.*")) {
            return;
        }
        storedFiles.push(f);
        if (storedFiles.length > 0) {
            container.style.width = "150px";
            text.innerText = "+";
            text.style.fontSize = "60px";
            image.style.display = "none";
            container.style.border = "2px dashed #eeedfc";
        }
        const reader = new FileReader();
        reader.onload = function (e) {
            const html = "<div><img src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile' title='Kliknij, aby usunąć'>" + "<p>" + f.name.replace(/(.{18})..+/, "$1…") + "</p></div>";
            selectedFiles.append(html);
        }
        reader.readAsDataURL(f);
    });
}

function removeFile(e) {
    let file = $(this).data("file");
    const container = document.querySelector(".uploadContainer"),
        text = document.querySelector(".uploadText p"),
        image = document.querySelector(".uploadText img");
    for (let i = 0; i < storedFiles.length; i++) {
        if (storedFiles[i].name === file) {
            storedFiles.splice(i, 1);
            break;
        }
    }
    $(this).parent().remove();
    if (storedFiles.length == 0) {
        container.style.width = "100%";
        text.innerText = "Dodaj zdjęcia";
        text.style.fontSize = "14px";
        image.style.display = "block";
        container.style.border = "2px dashed #eeedfc";
    }
}