window.onload = function () {

    function changeImage (big_image, small_image) {

        big_image.src = small_image.src;

    }

    var big_image = document.getElementById("main");

    var div = document.getElementById("carrusel");

    var small_images = div.getElementsByTagName("img");

    for (let image of small_images) {

        image.onmouseover = function () {
            image.width = 180;
            image.height = 180;
        }

        image.onmouseleave = function () {
            image.width = 150;
            image.height = 150;
        }

        image.ondblclick = function () {

            changeImage(big_image, image);

        }

    }

}