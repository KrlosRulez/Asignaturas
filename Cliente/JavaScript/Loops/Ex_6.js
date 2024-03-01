window.onload = function () {

    var num;

    var sum = 0;

    while (num != -1) {

        num = parseInt(prompt("Enter a number (-1 to Exit)"));

        if (!(Number.isInteger(num))) {

            alert("Enter Numbers Only!");
            
        } else {

            if (num == -1) {
                break;
            }
    
            if (num < 0) {
                alert("Only positive numbers!");
            } else {
                sum += num;
            }
        }

    }

    alert(`Addition: ${sum}`);

}