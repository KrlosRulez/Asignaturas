window.onload = function () {

    var num1 = parseInt(prompt("Enter a number:"));
    var num2 = parseInt(prompt("Enter another number:"));
    var num3 = parseInt(prompt("Enter another number:"));

    var array_1 = [];

    // Solución mas eficiente ====================

    var array_2 = [num1, num2, num3];

    if (array_2[0] > array_2[1]) {
        temp=array_2[0];
        array_2[0]=array_2[1];
        array_2[1]=temp;
        //[array_2[0], array_2[1] = array_2[1], array_2[0]];
    }

    if (array_2[1] > array_2[2]) {
        temp=array_2[1];
        array_2[1]=array_2[2];
        array_2[2]=temp;
        //[[array_2[1], array_2[2]] = [array_2[2], array_2[1]]];
    }

    if (array_2[0] > array_2[1]) {
        temp=array_2[0];
        array_2[0]=array_2[1];
        array_2[1]=temp;
        //[array_2[0], array_2[1] = array_2[1], array_2[0]];
    }

    console.log(array_2);

    // ===========================================

    // if (num1 > num2 && num1 > num3 && num2 > num3) {

    //     array_1.push(num3, num2, num1);

    // } else if (num1 > num2 && num1 > num3 && num2 < num3) {

    //     array_1.push(num2, num3, num1);

    // } else if (num1 < num2 && num1 > num3 && num2 > num3) {

    //     array_1.push(num3, num1, num2);

    // } else if (num1 < num2 && num1 < num3 && num2 > num3) {

    //     array_1.push(num1, num3, num2);

    // } else if (num1 > num2 && num1 < num3 && num2 < num3) {

    //     array_1.push(num2, num1, num3);

    // } else {

    //     array_1.push(num1, num2, num3);

    // }

    // console.log(array_1);

}