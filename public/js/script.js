function preview() {
    const sampul = document.querySelector("#sampul");
    const imgPreview = document.querySelector(".img-preview");
    const fileSampul = new FileReader();

    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function (e) {
        imgPreview.src = e.target.result;
    };
}
