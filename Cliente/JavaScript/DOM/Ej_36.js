window.onload = function () {

    var foto = document.querySelector("img");

    var imagesArray = [
        "https://picsum.photos/id/237/400/300",
        "https://picsum.photos/id/236/400/300",
        "https://picsum.photos/id/235/400/300",
        "https://picsum.photos/id/234/400/300"
    ];

    var randomNumber = Math.floor(Math.random() * imagesArray.length);

    foto.src = imagesArray[randomNumber];

}