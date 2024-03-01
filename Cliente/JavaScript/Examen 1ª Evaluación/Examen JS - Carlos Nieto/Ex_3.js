window.onload = function () {

    var div_contenedor = document.getElementById("contenedor");

    // Crear Formulario

    var form = document.createElement("form");

    var label_password = document.createElement("label");
    label_password.htmlFor = "password";
    label_password.innerText = "Password:";

    form.appendChild(label_password);

    var input_password = document.createElement("input");
    input_password.type = "text";
    input_password.id = "password";

    form.appendChild(input_password);

    var br_1 = document.createElement("br");
    form.appendChild(br_1);
    var br_2 = document.createElement("br");
    form.appendChild(br_2);

    var label_repeat = document.createElement("label");
    label_repeat.htmlFor = "repeat";
    label_repeat.innerText = "Repeat Password:";

    form.appendChild(label_repeat);

    var input_repeat = document.createElement("input");
    input_repeat.type = "text";
    input_repeat.id = "repeat";

    form.appendChild(input_repeat);

    var br_3 = document.createElement("br");
    form.appendChild(br_3);
    var br_4 = document.createElement("br");
    form.appendChild(br_4);

    var error_p = document.createElement("p");
    error_p.style.display = "none";
    form.appendChild(error_p);

    var button = document.createElement("button");
    button.innerText = "Change Password";
    button.id = "button";

    form.appendChild(button);

    div_contenedor.appendChild(form);

    // Fin Crear Formulario

    function checkPasswords() {

        if (input_password.value != input_repeat.value) {

            error_p.innerText = "Passwords do not match";
            error_p.style.display = "block";

            button.disabled = true;

        } else {

            error_p.innerText = "";
            error_p.style.display = "none";

            button.disabled = false;

        }

    }

    input_password.addEventListener("input", checkPasswords);
    input_repeat.addEventListener("input", checkPasswords);

}