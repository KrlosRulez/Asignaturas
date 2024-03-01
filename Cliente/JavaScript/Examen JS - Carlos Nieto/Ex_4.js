window.onload = function () {

    var random_array = [];

    for (let i = 0; i < 10; i++) {

        random_array.push(Math.floor(Math.random() * 7) + 1);

    }

    console.log(random_array);
    document.write(`Original Array: ${random_array}<br />`);

    for (let x = 1; x <= 7; x++) {

        let times = 0;

        for (let value of random_array) {

            if (x == value) {
                times++;
            }

        }

        if (times > 1) {
            document.write(`Number ${x} is repeated ${times} times<br />`);
        }

    }

}