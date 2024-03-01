window.onload = function () {

    var lengthSixOrMore = (x) => { return x.length >= 6; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const filteredArray = countries.filter(lengthSixOrMore);

    console.log(filteredArray); 

}