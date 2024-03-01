window.onload = function () {

    console.log(document.querySelectorAll(".impar"));

    console.log(document.querySelector(".impar").innerHTML);

    console.log(document.querySelector(".impar").innerText);

    var image = document.getElementById("imagen");

    console.log(image.getAttribute("height"));

    image.setAttribute("title", "Pedro");
    image.setAttribute("width", "250");
    image.setAttribute("height", "250");

    image.removeAttribute("title");

    var link = document.createElement("a");

    link.innerHTML = "<i>Link a la Moncloa</i>";
    link.href = "https://solvam.es";
    link.target = "_blank";

    var body = document.querySelector("body");

    body.appendChild(link);

    // ######################################

    var item = document.createElement("li");

    item.innerText = "Cinco";

    var ul = document.querySelector("ul");

    // ul.appendChild(item);

    ul.insertBefore(
        item,
        document.getElementsByTagName("li")[3] 
    );

    // ######################################

}