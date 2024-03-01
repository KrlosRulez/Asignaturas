window.onload = function () {

    var subWindow;

    var hacido = false;

    var button_open = document.getElementById("open");
    
    var button_resize = document.getElementById("resize");

    button_open.onclick = function () {

        subWindow = window.open("", "new", "height=100, width=100, toolbar=no, menubar=no, location=no");
        subWindow.document.body.style.backgroundColor = "red";

        hacido = true;

    }

    button_resize.onclick = function () {

        if (hacido == true) {

            subWindow.resizeTo(250, 250);
            subWindow.focus();

        }

    }

}