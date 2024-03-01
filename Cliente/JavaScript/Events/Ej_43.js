window.onload = function () {

    var parraf = document.getElementsByTagName("p")[0];

    parraf.onmouseover = function() {
        parraf.style.backgroundColor = "grey";
    }

    parraf.onmouseout = function() {
        parraf.style.backgroundColor = "green";
    }

    parraf.onclick = function() {
        parraf.style.backgroundColor = "red";
    }

    parraf.ondblclick = function() {
        parraf.style.backgroundColor = "blue";
    }

}