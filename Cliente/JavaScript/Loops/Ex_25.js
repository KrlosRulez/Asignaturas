window.onload = function () {

    var stopped = false;

    var mySet = new Set([]);

    do {

        var newCity = prompt("Enter a city");

        if (newCity == "stop") {
            stopped = true;
        } else {

            mySet.add(newCity);

        }

    } while (stopped == false);

    mySet.forEach(
        (value) => {
            document.write(value + "<br />");
        }
    )

    document.write("<br />");

    // Ordenar

    var newArray = Array.from(mySet);
    newArray.sort();
    mySet = new Set(newArray);
    
    mySet.forEach(
        (value) => {
            document.write(value + "<br />");
        }
    )

}