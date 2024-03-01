window.onload = function () {

    var user_number = parseInt(prompt("Enter a Year", "2023"));

    if (((user_number % 4 == 0) && (user_number % 100 != 0)) || (user_number % 400 == 0)) {
        alert(`${user_number} is a leap year`);
    } else {
        alert(`${user_number} is not a leap year`);
    }

}