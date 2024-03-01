window.onload = function () {

    // function isOdd(num) {

    //     if ((num % 2) != 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }

    // }

    var isOdd = num => { if (num % 2 != 0) { return true } else { return false } };

    var num = parseInt(prompt("Enter a number"));

    if (isOdd(num) == true) {
        console.log(`${num} is Odd`);
    } else {
        console.log(`${num} is not Odd`);
    }

}