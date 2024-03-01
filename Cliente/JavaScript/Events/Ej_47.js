window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    var image = document.getElementsByTagName("img")[0];

    var actual_src = image.src;

    var new_h1 = document.createElement("h1");

    new_h1.innerText = "Welcome to the Himalaya!";

    body.insertBefore(new_h1, image);

    image.onmouseover = function () {

        image.src = "players/Wade.jpg";

    }

    image.onmouseleave = function () {

        image.src = actual_src;

    }

    image.onclick = function () {

        alert("Stop clicking me!!");

    }

}