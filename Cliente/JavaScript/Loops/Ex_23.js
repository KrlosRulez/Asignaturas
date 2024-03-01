window.onload = function () {

    var divideByTwo = x => x/2;

    var divideTwoNumbers = (x, y) => { if (x > y) { return x/y } else { return y/x } };

    var number_x = 6;
    var number_y = 8;

    console.log(divideByTwo(number_x));

    console.log(Math.round(divideTwoNumbers(number_x, number_y)));

}