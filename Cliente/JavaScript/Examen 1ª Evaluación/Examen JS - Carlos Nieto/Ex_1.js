window.onload = function () {

    function insertAfter(newNode, referenceNode) {

        let reference = referenceNode.nextElementSibling;

        let parentNode = reference.parentNode;

        parentNode.insertBefore(newNode, reference);

    }

    var newNode = document.createElement("span");
    newNode.innerText = "span";

    var referenceNode = document.getElementById("div-1");

    insertAfter(newNode, referenceNode);

}