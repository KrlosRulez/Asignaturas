window.onload = function () {

    var input_text = document.getElementById("input-text");

    var p_error = document.getElementById("val");

    input_text.addEventListener("keypress", function (event) {

        console.log(event.key);

        if (event.key == "d" || event.key == "a" || event.key == "w") {

            event.preventDefault();
            p_error.innerText = `The letter ${event.key} is not allowed in this page`;

        } else {

            p_error.innerText = "";

        }

    });

}