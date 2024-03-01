window.onload = function () {

    // function isPalindrome(user_string) {

    //     let string_array = (user_string.split(""));
    //     let reverse_array = ([...string_array].reverse());

    //     string_array = string_array.toString().replace(/ /g, "").replace(/,/g, "");
    //     reverse_array = reverse_array.toString().replace(/ /g, "").replace(/,/g, "");

    //     // console.log("String Array: " + string_array);
    //     // console.log("Reverse Array: " + reverse_array);

    //     if (string_array.toUpperCase() == reverse_array.toUpperCase()) {
    //         console.log(`${user_string} is a Palindrome`);
    //     } else {
    //         console.log(`${user_string} is not a Palindrome`);
    //     }

    // }

    var isPalindrome = user_string => {

        let string_array = (user_string.split(""));
        let reverse_array = ([...string_array].reverse());

        string_array = string_array.toString().replace(/ /g, "").replace(/,/g, "");
        reverse_array = reverse_array.toString().replace(/ /g, "").replace(/,/g, "");

        if (string_array.toUpperCase() == reverse_array.toUpperCase()) {
            console.log(`${user_string} is a Palindrome`);
        } else {
            console.log(`${user_string} is not a Palindrome`);
        }

    } 

    var user_string = prompt("Enter a String");
    isPalindrome(user_string);

}