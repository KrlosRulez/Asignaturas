window.onload = function () {

    var real_password = "daw";

    var guess_password = prompt("Enter Password");

    var today = new Date();
    var actual_date = today.getDate() + " - " + (today.getMonth() + 1) + " - " + today.getFullYear();
    var actual_time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    if (guess_password == real_password) {
        alert(`Hello DAW pupil | ${actual_date} | ${actual_time}`);
    } else {
        alert("Acces Denied");
    }

}