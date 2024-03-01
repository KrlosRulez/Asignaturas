window.onload = function () {

    var toUpCase = (x) => { return x.toUpperCase(); }
    
    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const UpCountries = countries.map(toUpCase);

    console.log(UpCountries);

}