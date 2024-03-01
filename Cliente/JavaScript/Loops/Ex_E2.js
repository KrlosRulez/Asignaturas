window.onload = function () {

    var array_1 = ["Viva", "El", "Betis", "Pedro", "Sánchez"];

    var string_array = "";

    for (let i = 0; i < array_1.length; i++) {
        string_array += " " + array_1[i]; 
    }

    document.write(string_array);

}