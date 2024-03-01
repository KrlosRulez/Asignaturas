window.onload = function () {

    var showName = (item, index) => { console.log(`Country ${index}: ${item}`); }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    countries.forEach(showName);

}