window.onload = function () {

    var expenses = parseFloat(prompt("Enter your expenses"));

    if (expenses < 25.34) {
        alert("You are a Standard Client");
    } else if (expenses >= 25.34 && expenses < 57.16) {
        alert("You are a Bronze Client");
    } else if (expenses >= 57.16 && expenses < 68.04) {
        alert("You are a Silver Client");
    } else if (expenses >= 68.04) {
        alert("You are a Gold Client");
    }
}