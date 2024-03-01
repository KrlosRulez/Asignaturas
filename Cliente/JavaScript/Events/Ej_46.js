window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    var p = document.createElement("p");

    p.innerText = "Mueve el ratón";

    body.appendChild(p);

    body.onmousemove = function (event) {

        p.innerHTML = `X: ${event.clientX} <br />Y: ${event.clientY}`;

    }

}