window.onload = function () {

    function average(...args) {

        let elements = 0;

        let addition = 0;

        for (let i = 0; i < args.length; i++) {

            addition += number_array[i];

            elements++;

        }

        //console.log(`args.length: ${args.length}`);
        //console.log(`Elements: ${elements}`);

        console.log(`Array: ${args}`);

        if (elements == 0) {
            console.log("Undefined");
        } else {

            let total = (addition / elements);
            console.log(`Average: ${total}`);

        }

    }

    var number_array = [2, 8, 9, 1];
    average(...number_array);

}