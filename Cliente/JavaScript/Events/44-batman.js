window.onload = function () {

    function ListenerEsconder (input) {

        input.addEventListener("click", function() {
            borrarTextos(input);
        });

    }

    function borrarTextos (input) {

        var p = input.previousSibling.previousSibling;
        var h1 = p.previousSibling.previousSibling;
        p.style.display = "none";
        h1.style.display = "none";

        input.value = "SHOW";

        ListenerMostrar(input);

    }

    function ListenerMostrar (input) {

        input.addEventListener("click", function() {
            mostrarTextos(input);
        });

    }

    function mostrarTextos (input) {

        var p = input.previousSibling.previousSibling;
        var h1 = p.previousSibling.previousSibling;
        p.style.display = "block";
        h1.style.display = "block";

        input.value = "HIDE";

        ListenerEsconder(input);

    }

    var movies = document.getElementsByTagName("div");

    for (let div of movies) {

        div.addEventListener("mouseover", function() {
            div.style.backgroundColor = "lightblue";
        });

        div.addEventListener("mouseout", function() {
            div.style.backgroundColor = "lightgray";
        });

    }

    var inputs = document.getElementsByTagName("input");

    for (let actual_input of inputs) {

        actual_input.addEventListener("click", function() {
            borrarTextos(actual_input);
        });

    }

}