window.onload = function () {

    // function quadraticSolver(a, b, c) {

    //     let array_solutions = [];

    //     array_solutions[0] = ( ( (!b) + Math. sqrt( (b*b) - (4 * a * c) ) ) / ( 2 * a ) );
    //     array_solutions[1] = ( ( (!b) - Math. sqrt( (b*b) - (4 * a * c) ) ) / ( 2 * a ) );

    //     console.log(`Solution 1: ${array_solutions[0]}`);
    //     console.log(`Solution 2: ${array_solutions[1]}`);

    // }

    var quadraticSolver = (a, b, c) => {

        let array_solutions = [];

        array_solutions[0] = ( ( (!b) + Math. sqrt( (b*b) - (4 * a * c) ) ) / ( 2 * a ) );
        array_solutions[1] = ( ( (!b) - Math. sqrt( (b*b) - (4 * a * c) ) ) / ( 2 * a ) );

        console.log(`Solution 1: ${array_solutions[0]}`);
        console.log(`Solution 2: ${array_solutions[1]}`);

    }

    var a = parseInt(prompt("Enter 'a'"));
    var b = parseInt(prompt("Enter 'b'"));;
    var c = parseInt(prompt("Enter 'c'"));;

    quadraticSolver(a, b, c);

}