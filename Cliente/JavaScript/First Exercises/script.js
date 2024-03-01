window.onload = function () {
    var nombre="Krlos";
    console.log(nombre);
    surname="Boss";
    // alert(surname);

    // Métodos con Strings

    var str = "Viva el Vino";

    console.log("Frase: " + str);
    console.log("Longitud frase: " + str.length);
    console.log("Frase en Mayúsculas: " + str.toUpperCase());
    console.log("Frase en Minúsculas: " + str.toLowerCase());
    console.log("Del primer al cuarto caracter: " + str.substring(0, 4));

    var str_num = "4.20";
    var int_num = parseInt(str_num);
    var float_num = parseFloat(str_num);

    console.log("Número (en String): " + str_num);
    console.log("Número (en Int): " + int_num);
    console.log("Número (en Float): " + float_num);

    let coche = prompt("Cual es tu carro?", "BMW");
    let val = confirm("Pulsa OK pa seguir");

}

// MOSTRAR DATOS =============================

// alert(nombre);
// document.write(nombre);

// PEDIR DATOS ===============================

// let coche = prompt("Cual es tu carro?", "BMW");
// let val = confirm("Pulsa OK pa seguir");

// VARIABLES =================================

// Al usar variables let dentro de un bucle,
// la variable desaparecerá al salir del bucle

// Las variables const son iguales que las let
// pero no se podrá cambiar su valor
// una vez asignado

// Si se utilizan variables let o const fuera
// de un bucle o una función se comportarán
// igual que las variables var

// TIPOS DE DATOS ============================

