window.onload = function () {

    var temp = "";

    for (let i = 1; i <= 7; i++) {

        temp = temp + "" + i;
        document.write(temp);

        for (let x = (7 - i); x >= 1; x--) {
            document.write("*");
        }

        document.write("<br />");

    }

}