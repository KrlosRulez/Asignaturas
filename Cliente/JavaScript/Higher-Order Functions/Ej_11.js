window.onload = function () {

    var greaterThanSeven = (x) => { return x.length > 7; }

    const names = ['Eve', 'Mathias', 'Derek', 'Athenea'];

    console.log(`The length of some name is greater than seven => ${names.some(greaterThanSeven)}`);

}