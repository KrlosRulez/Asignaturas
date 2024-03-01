window.onload = function () {

    var div_thumbnails = document.getElementById("thumbnailsPanel");

    const array_routes = ["additive.jpg", "chains.jpg", "charger.jpg", "light.jpg", "oil.jpg"];

    for (let route of array_routes) {

        let new_img = document.createElement("img");
        new_img.src = `img/${route}`;
        new_img.width = "100";
        new_img.height = "140";
        div_thumbnails.appendChild(new_img);

    }

}