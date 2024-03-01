window.onload = function () {

    var firstSixLetters = (x) => { return x.length == 6; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    console.log(`Index of the first country with six letters: ${countries.findIndex(firstSixLetters)}`);

}