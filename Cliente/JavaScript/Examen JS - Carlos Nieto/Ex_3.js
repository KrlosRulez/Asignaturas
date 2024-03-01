window.onload = function () {

    var user_number = parseInt(prompt("Enter a number"));

    function amountToCoins(number) {

        // =========================

        var array_monedas = [50, 20, 10, 5, 2, 1];

        var array_coins = [];

        for (let i = 0; i < array_monedas.length; i++) {

            var moneda_actual = array_monedas[i];

            while (number >= moneda_actual) {
                number = number - moneda_actual;
                array_coins.push(moneda_actual);
            }

        }

        return array_coins;

        // =========================

        

        /*var coins_50 = 0;
        var coins_20 = 0;
        var coins_10 = 0;
        var coins_5 = 0;
        var coins_2 = 0;
        var coins_1 = 0;

        while (number >= 50) {
            coins_50 += 1;
            number = number - 50;
            array_coins.push(50);
        }

        while (number >= 20) {
            coins_20 += 1;
            number = number - 20;
            array_coins.push(20);
        }

        while (number >= 10) {
            coins_10 += 1;
            number = number - 10;
            array_coins.push(10);
        }

        while (number >= 5) {
            coins_5 += 1;
            number = number - 5;
            array_coins.push(5);
        }

        while (number >= 2) {
            coins_2 += 1;
            number = number - 2;
            array_coins.push(2);
        }

        while (number >= 1) {
            coins_1 += 1;
            number = number - 1;
            array_coins.push(1);
        }*/

    }

    console.log(amountToCoins(user_number));

}