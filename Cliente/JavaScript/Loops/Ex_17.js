window.onload = function () {

    function greaterThanAverage(dataArray, num) {

        let elements = 0;

        let addition = 0;

        let average = 0;

        for (let i = 0; i < dataArray.length; i++) {

            addition += number_array[i];

            elements++ ;

        }

        console.log(`Array: ${dataArray}`);

        // console.log(`Elements: ${elements}`);

        if (elements == 0) {
            console.log("Undefined");
        } else {

            average = (addition / elements);
            console.log(`Average: ${average}`);

        }

        if (num == average) {
            console.log(`${num} is the Average`);
        } else if (num < average) {
            console.log(`${num} is lower than the Average`);
        } else {
            console.log(`${num} is greater than the Average`);
        }

    }

    var number_array = [2, 8, 9, 1];
    var number = parseInt(prompt("Enter a number"));
    greaterThanAverage(number_array, number);

}