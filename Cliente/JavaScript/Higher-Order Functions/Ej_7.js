window.onload = function () {

    var lengthSix = (x) => { return x.length == 6; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const filteredArray = countries.filter(lengthSix);

    console.log(filteredArray); 

}