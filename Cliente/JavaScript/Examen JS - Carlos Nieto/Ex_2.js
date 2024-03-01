window.onload = function () {

    var user_text = prompt("Enter some text", "Pedro Sánchez Viva el Betis");

    var array_of_words = user_text.split(" ");

    console.log(`Array of Words: ${array_of_words}`);

    var fiveOrMore = word => word.length >= 5 ;

    array_of_words = array_of_words.filter(fiveOrMore);

    var final_array = [...new Set(array_of_words)];

    console.log(`Array Five or More Letters: ${final_array}`);

    final_array.sort();

    console.log(`Sorted Array: ${final_array}`);

    for (let value of final_array) {

        document.write(`Word: ${value} - Letters: ${value.length}<br />`);

    }

}