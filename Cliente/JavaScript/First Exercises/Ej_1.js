var num1 = parseInt(prompt("Introduce un número"));
var num2 = parseInt(prompt("Introduce otro número"));
var suma = num1 + num2;
var resta = num1 - num2;
var multiplicacion = num1 * num2;
var division = num1 / num2;
var exponente = num1 ** num2; // == Math.pow(num1,num2);
var modulo = num1 % num2;
console.log(num1 + " + " + num2 + " = " + suma);
console.log(num1 + " - " + num2 + " = " + resta);
console.log(num1 + " * " + num2 + " = " + multiplicacion);
console.log(num1 + " / " + num2 + " = " + division);
console.log(num1 + " ** " + num2 + " = " + exponente);
console.log(num1 + " % " + num2 + " = " + modulo);