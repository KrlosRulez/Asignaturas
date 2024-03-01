window.onload = function () {

    var firstSixLetters = (x) => { return x.length == 6; }

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    console.log(`First country with six letters: ${countries.find(firstSixLetters)}`);

}