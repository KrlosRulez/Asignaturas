window.onload = function () {

    var array_1 = ["Viva", "El", "Betis", "Pedro"];

    var user_number = parseInt(prompt("Enter a number"));

    if (user_number >= 0 && user_number < array_1.length) {
        document.write(array_1[user_number]);
    } else {
        alert("Index out of bounds");
    }

}