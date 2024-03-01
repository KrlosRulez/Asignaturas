window.onload = function () {

    var myHome = {
        "address": "C/Street 106",
        "rooms": 4,
        "squareMeters": 600,
        "extras": ["swimming pool", "garden"]
    };

    console.log(myHome["address"]);
    console.log(myHome["rooms"]);
    console.log(myHome["squareMeters"]);
    console.log(myHome["extras"]);

    myHome["elevator"] = false;

    delete myHome["squareMeters"];

    if (myHome.hasOwnProperty("squareMeters") == true) {
        console.log("squareMeters exist");
    } else {
        console.log("squareMeters don't exist");
    }

    if (myHome.hasOwnProperty("rooms") == true) {
        console.log("rooms exist");
    } else {
        console.log("rooms don't exist");
    }

}