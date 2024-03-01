window.onload = function () {

    var prices = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

    var addVAT = price => price * 1.21 ;

    prices = prices.map(addVAT);

    console.log(prices);

}