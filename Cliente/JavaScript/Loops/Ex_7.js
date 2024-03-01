window.onload = function () {

    if (confirm("Press a Button") == true) {

        setTimeout(() => {
            alert("You Pressed Aceptar");
        }, 2000);

    } else {

        setTimeout(() => {
            alert("You Pressed Cancelar");
        }, 2000);

    }

}