window.onload = function () {

    //var nueva_fila = document.createElement("tr");

    //nueva_fila.innerHTML = "<td>Row3 cell1</td><td>Row3 cell2</td>";

    var tabla = document.querySelector("table tbody");

    //tabla.appendChild(nueva_fila);

    //var filas = document.getElementsByTagName("tr");

    //for (let i = 0; i < filas.length; i++) {
        
        //let nueva_columna = document.createElement("td");

        //nueva_columna.innerText = `Row${i + 1} cell3`;

        //filas[i].appendChild(nueva_columna);

    //}

    // ###################################################

    if (tabla == null) {

        alert("No hay ninguna tabla");

    } else {

        var user_row = parseInt(prompt("Enter the row"));

        var row_check = tabla.getElementsByTagName("tr")[user_row - 1];

        if (row_check == undefined) {

            alert("Out of Range");

        } else {

        var user_column = parseInt(prompt("Enter the column"));

        var column_check = row_check.getElementsByTagName("td")[user_column - 1];
    
        if (column_check == undefined) {
                
            alert("Out of Range");
            
        }

        }

        function changeText(user_row, user_column, user_text) {

            var table_row = tabla.getElementsByTagName("tr")[user_row - 1];

            var table_column = table_row.getElementsByTagName("td")[user_column - 1];
    
            table_column.innerText = user_text;

        }

        if (row_check != undefined && column_check != undefined) {

            var user_text = prompt("Enter the new text");

            changeText(user_row, user_column, user_text);

        }

    }

}