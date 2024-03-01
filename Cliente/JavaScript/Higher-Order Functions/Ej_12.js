window.onload = function () {

    var containsLand = (x) => { return x.includes("land"); }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    console.log(`All the countries contains "land" => ${countries.every(containsLand)}`);

}