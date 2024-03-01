window.onload = function () {

    ages = [];

    for (let i = 0; i < 5; i++) {

        ages[i] = parseInt(prompt("Enter an age"));

    }

    var cut_age = parseInt(prompt("Enter the minimum age"));

    function cutAge(x) {

        return x > cut_age;

    }

    var final_array = ages.filter(cutAge);

    console.log(final_array);

}