window.onload = function () {

    var input_string = prompt("Write Something", "Viva el Betis y Pedro Sánchez");

    var string_array = input_string.split(" ");

    // Number of words
    document.write(`Number of Words: ${string_array.length}`);
    document.write("<br />");

    // First Word
    document.write(`First word: ${string_array[0]}`);
    document.write("<br />");

    // Last Word
    document.write(`Last word: ${string_array[(string_array.length - 1)]}`);
    document.write("<br />");

    // Words in reverse order
    document.write(`Words in reverse order: ${string_array.reverse()}`);
    document.write("<br />");

    // Words ordered from a to z
    document.write(`Words ordered from a to z: ${string_array.sort()}`);
    document.write("<br />");

    // Words ordered from z to a
    document.write(`Words ordered from z to a: ${string_array.sort().reverse()}`);
    document.write("<br />");

}