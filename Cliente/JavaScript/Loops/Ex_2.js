window.onload = function () {

    var fruit_name = prompt("Enter a name of a fruit");

    switch (fruit_name) {
        case "Banana":
            alert("Banana is Good");
            break;
        case "Orange":
            alert("I'm not a fan of Orange");
            break;
        case "Apple":
            alert("Oh really, do you like apples?");
            break;
        default:
            alert("I dunno man");
            break;
    }

}