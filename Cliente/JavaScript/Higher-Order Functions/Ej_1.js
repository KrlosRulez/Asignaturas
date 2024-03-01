window.onload = function () {

    const numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    const sum = numbers.reduce(
        (accumulator, currVal) => {
            return accumulator + currVal;
        }
    );

    console.log(sum);

    // =============================================

    var createText = (item, index) => {
        text += index + ": " + item + "<br />";
    }

    var text = "";

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    countries.forEach(createText);
    document.write(text);

}