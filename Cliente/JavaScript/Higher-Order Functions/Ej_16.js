window.onload = function () {

    var findNorway = (x) => { return x == "Norway"; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    console.log(`Position of Norway: ${countries.findIndex(findNorway)}`);

}