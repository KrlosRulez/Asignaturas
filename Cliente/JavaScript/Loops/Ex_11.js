window.onload = function () {

    // function isEven(num) {

    //     if ((num % 2) == 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }

    // }

    var isEven = num => { if (num % 2 == 0) { return true } else { return false } };

    var num = parseInt(prompt("Enter a number"));

    if (isEven(num) == true) {
        console.log(`${num} is Even`);
    } else {
        console.log(`${num} is not Even`);
    }
    
}