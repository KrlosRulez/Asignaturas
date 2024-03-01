window.onload = function () {

    var nueva_fila = document.createElement("tr");

    nueva_fila.innerHTML = "<td>Row3 cell1</td><td>Row3 cell2</td>";

    var tabla = document.querySelector("table tbody");

    tabla.appendChild(nueva_fila);

    

    var filas = document.getElementsByTagName("tr");

    for (let i = 0; i < filas.length; i++) {
        
        let nueva_columna = document.createElement("td");

        nueva_columna.innerText = `Row${i + 1} cell3`;

        filas[i].appendChild(nueva_columna);

    }

}