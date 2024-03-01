window.onload = function () {

    var random_number = parseInt((Math.random() * 11));

    var guess = parseInt(prompt("Enter a number between 1 & 10"));

    if (random_number == guess) {
        alert("Well Done!");
    } else {
        alert("Sorry, wrong guess...");
    }

    console.log(random_number);

}