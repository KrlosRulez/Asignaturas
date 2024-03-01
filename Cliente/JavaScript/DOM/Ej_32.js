// Número de Links: 7
// URL del penúltimo link: http://prueba4
// Número de links a (http://prueba): 3
// Número de links en el tercer parrafo: 3

window.onload = function () {

    var num_links = document.getElementsByTagName("a");

    var URL = num_links[(num_links.length - 2)].href;

    var contador = 0;

    for (let valor of num_links) {

        if (valor.href == "http://prueba/") {
            contador++;
        }

    }

    var tercer_parrafo = document.getElementsByTagName("p")[2];

    var links_tercer = tercer_parrafo.querySelectorAll("a");

    console.log(tercer_parrafo);

    console.log(
        `Número de links: ${num_links.length}
        \nURL del penúltimo enlace: ${URL}
        \nLinks a http://prueba/: ${contador}
        \nNúmero de links en el tercer parrafo: ${links_tercer.length}`
    );

    document.write(
        `Número de links: ${num_links.length}
        <br />URL del penúltimo enlace: ${URL}
        <br />Links a http://prueba/: ${contador}
        <br />Número de links en el tercer parrafo: ${links_tercer.length}`
    );

}