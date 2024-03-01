window.onload = function () {

    var startsWithE = (x) => { return x.startsWith("E"); }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const filteredArray = countries.filter(startsWithE);

    console.log(filteredArray); 

}