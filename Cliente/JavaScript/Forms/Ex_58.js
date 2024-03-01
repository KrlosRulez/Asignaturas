window.onload = function () {

    var input_text = document.getElementById("input-text");

    var span = document.getElementById("str");

    const length_8 = /^.{8,}$/;

    const highEx = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#"<>{}¿?&])[A-Za-z\d@$!%*?&]{8,}$/;

    const mediumEx = /^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

    input_text.addEventListener("input", function () {

        var valor = input_text.value;

        // console.log(valor);

        if (length_8.test(valor)) {

            if (highEx.test(valor)) {

                span.classList = "high";

                span.innerText = "Password Strength: High";

            } else if (mediumEx.test(valor)) {

                span.classList = "medium";

                span.innerText = "Password Strength: Medium";

            } else {

                span.classList = "low";

                span.innerText = "Password Strength: Low";

            }

        } else {

            span.classList = "invalid";

            span.innerText = "Invalid Password!";

        }

    });

}