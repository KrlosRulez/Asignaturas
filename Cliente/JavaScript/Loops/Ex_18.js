window.onload = function () {

    // function linearSearch(dataArray, num) {

    //     let found = false;

    //     for (let i = 0; i < dataArray.length; i++) {

    //         if (num == dataArray[i]) {
    //             found = true;
    //             break;
    //         }

    //     }

    //     if (found == true) {
    //         console.log(`${num} it's included in the array`);
    //     } else {
    //         console.log(`${num} isn't included in the array`);
    //     }

    // }

    var linearSearch = (dataArray, num) => {

        let found = false;

        for (let i = 0; i < dataArray.length; i++) {

            if (num == dataArray[i]) {
                found = true;
                break;
            }

        }

        if (found == true) {
            console.log(`${num} it's included in the array`);
        } else {
            console.log(`${num} isn't included in the array`);
        }

    }

    var number_array = [4, 7, 12, 3];
    console.log(`Array: ${number_array}`);
    var user_number = parseInt(prompt("Enter a number"));

    linearSearch(number_array, user_number);

}