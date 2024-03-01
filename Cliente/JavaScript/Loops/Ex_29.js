window.onload = function () {

    const LetterOfNumber = new Map([[0, "T"],
    [1, "R"], [2, "W"], [3, "A"], [4, "G"], 
    [5, "M"], [6, "Y"], [7, "F"], [8, "P"], 
    [9, "D"], [10, "X"], [11, "B"], [12, "N"], 
    [13, "J"], [14, "Z"], [15, "S"], [16, "Q"], 
    [17, "V"], [18, "H"], [19, "L"], [20, "C"], 
    [21, "K"], [22, "E"], ]);

    var user_dni = parseInt(prompt("Enter your DNI"));

    if (isNaN(user_dni)) {
        console.log(`That is not a number`);
    } else {

    var user_as_letter = (user_dni % 23);

    // console.log(user_as_letter);

    for (let i = 0; i < LetterOfNumber.size; i++) {

        if (user_as_letter == i) {
            var user_letter = LetterOfNumber.get(i);
        }

    }

    var WriteLetter = (user_dni, user_letter) => {

        var complete_dni = user_dni + "" + user_letter;

        return complete_dni;

    }

    console.log(`Complete DNI: ${WriteLetter(user_dni, user_letter)}`);
    
    }

}