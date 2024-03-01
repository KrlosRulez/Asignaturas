window.onload = function () {

    grades = [];

    for (let i = 0; i < 5; i++) {

        grades[i] = parseInt(prompt("Enter a grade"));

    }

    function failingGrade(x) {

        return x < 5;

    }

    var failed_grades = grades.some(failingGrade);

    if (failed_grades == true) {
        console.log("There is some grade below 5");
    } else {
        console.log("All the grades are 5 or more");
    }

}