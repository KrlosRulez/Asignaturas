window.onload = function () {

    var array_names = ["Jose", "Lola", "Lorenzo", "Mariluz", "Maria Jose"];

    var guess_name = prompt("Enter the name of a teacher");

    var found = false;

    for (let value of array_names) {

        if (value.toUpperCase() == guess_name.toUpperCase()) {
            found = true;
            break;
        }

    }

    if (found == true) {
        alert("Name Found!");
    } else {
        alert(`${guess_name} is not a teacher`);
    }

}