var num = parseInt(prompt("Enter a number"));
var sentence = prompt("Enter a sentence");
console.log("UpperCase: " + sentence.toUpperCase());
console.log("LowerCase: " + sentence.toLowerCase());
console.log("Until " + num + " = " + sentence.substring(0, num));