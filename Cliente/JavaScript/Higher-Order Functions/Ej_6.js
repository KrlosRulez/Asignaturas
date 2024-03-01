window.onload = function () {

    var containsLand = (x) => { return x.includes("land"); }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const filteredArray = countries.filter(containsLand);

    console.log(filteredArray);

}