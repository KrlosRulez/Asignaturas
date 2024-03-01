window.onload = function () {

    const countries = ['Estonia', 'Finland', 'Sweden', 'Denmark', 'Norway', 'Iceland'];

    const concatenate = countries.reduce(
        (accumulator, currVal) => {
            return accumulator + ", " + currVal;
        }
    );

    console.log(`${concatenate} are north European countries `);

}