window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    var cbx1 = document.getElementById("cbx1");
    var cbx2 = document.getElementById("cbx2");
    var cbx3 = document.getElementById("cbx3");
    var cbx4 = document.getElementById("cbx4");

    var array_cbx = [cbx1, cbx2, cbx3, cbx4];

    var select = document.createElement("select");

    select.style.display = "none";

    var opt1 = document.createElement("option");
    opt1.innerText = "Justice League";
    opt1.value = "Justice League";
    var opt2 = document.createElement("option");
    opt2.innerText = "Avengers";
    opt2.value = "Avengers";
    var opt3 = document.createElement("option");
    opt3.innerText = "Defenders";
    opt3.value = "Defenders";
    opt3.selected = "true";

    select.appendChild(opt1);
    select.appendChild(opt2);
    select.appendChild(opt3);

    body.appendChild(select);

    function mostrarSelect () {

        // Se podría usar la función higher-order "every"
        if (cbx1.checked && cbx2.checked && cbx3.checked && cbx4.checked) {

            select.style.display = "block";

        } else {

            select.style.display = "none";

        }

    }

    for (let cbx of array_cbx) {

        cbx.addEventListener("click", mostrarSelect);

    }

}