window.onload = function () {

    var num1 = parseInt(prompt("Enter a number"));
    var num2 = parseInt(prompt("Enter another number"));
    var num3 = parseInt(prompt("Enter another number"));

    var array_number = [num1, num2, num3];

    array_number.sort();

    console.log(array_number);

}