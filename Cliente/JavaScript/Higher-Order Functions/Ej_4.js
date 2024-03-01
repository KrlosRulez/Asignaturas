window.onload = function () {

    var calculateLength = (x) => { return "Country name length: " + x.length; }
    
    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const nameLength = countries.map(calculateLength);

    console.log(nameLength);

}