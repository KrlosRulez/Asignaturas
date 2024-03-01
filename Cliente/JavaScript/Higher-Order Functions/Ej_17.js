window.onload = function () {

    var findRussia = (x) => { return x == "Russia"; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    console.log(`Position of Russia: ${countries.findIndex(findRussia)}`);

}