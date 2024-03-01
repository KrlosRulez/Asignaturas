window.onload = function () {

    var parrafo = document.querySelector("p");

    var texto_parrafo = parrafo.innerText;

    console.log(texto_parrafo);

    parrafo.innerText = texto_parrafo +  " THIS IS MY TEXT";

    console.log(parrafo.innerText);

    // #####################################################

    var imagen = document.querySelector("img");

    imagen.src = "pedro.png";

    // #####################################################

    var ultimo_div = document.getElementsByTagName("div")[1];

    ultimo_div.style.border = "1px solid red";

    // #####################################################

    var link = document.querySelector("a");

    link.remove();

}