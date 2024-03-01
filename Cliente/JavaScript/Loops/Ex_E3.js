window.onload = function () {

    do {

        var num1 = parseInt(prompt("Enter a number"));
        var num2 = parseInt(prompt("Enter another number"));    

        var operation = prompt("Enter the operation", "1 - Add, 2 - Substract, 3 - Mult, 4 - Div, 'Exit' to exit");

        switch (operation) {
            case "1":
                alert(`Addition: ${num1+num2}`);
                break;
            case "2":
                alert(`Substraction: ${num1-num2}`);
                break;
            case "3":
                alert(`Multiplication: ${num1*num2}`);
                break;
            case "4":
                alert(`Division: ${num1/num2}`);
                break;
            case "Exit":
                alert("Goodbye");
                break;
            default:
                alert("Unknown");
                break;
        }

    } while (operation != "Exit");

}