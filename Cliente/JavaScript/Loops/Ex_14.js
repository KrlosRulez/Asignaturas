window.onload = function () {

    // function isPrime(num) {

    //     let prime = true;

    //     for (let i = (num - 1); i > 1; i--) {

    //         if (num % i == 0) {
    //             prime = false;
    //             break;
    //         }

    //     }

    //     if (prime == true) {
    //         console.log(`${num} is Prime`);
    //     } else {
    //         console.log(`${num} is not Prime`);
    //     }

    // }

    var isPrime = num => {

        let prime = true;

        for (let i = (num - 1); i > 1; i--) {

            if (num % i == 0) {
                prime = false;
                break;
            }

        }

        if (prime == true) {
            console.log(`${num} is Prime`);
        } else {
            console.log(`${num} is not Prime`);
        }

    }

    var num = parseInt(prompt("Enter a number"));
    isPrime(num);

}