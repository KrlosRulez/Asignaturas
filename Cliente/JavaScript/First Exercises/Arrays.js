window.onload = function () {

    var array_1 = [10, 20, 30, 40, 50];
    //console.log(array_1);
    //console.log(typeof array_1);
    console.log("Position 0: " + array_1[0]);
    console.log(`Position 1: ${array_1[1]}`);
    console.log("Position 2: " + array_1[2]);
    console.log("Position 3: " + array_1[3]);
    console.log("Position 4: " + array_1[4]);

    //var newElement = parseInt(prompt("Input a number: "));
    //array_1.push(newElement);
    //console.log(`New element: ${array_1[5]}`);
    //console.log("Array length: " + array_1.length);

    array_1.unshift("zero");
    console.log(array_1);

    var element = array_1.shift();
    console.log(array_1);
    console.log(element);

    console.log(array_1.indexOf(30));
    var pos = array_1.indexOf(30);
    //element = array_1.splice(pos, 1);
    //console.log(array_1);
    //console.log(`Deleted Element: ${element}`);

    element = array_1.splice(pos, 2, 80, 90);
    console.log(array_1);
    console.log(`Element: ${element}`);

    //console.log(element[1]);

    var array_2 = array_1.slice(1, 3);
    console.log(array_1);
    console.log(array_2);

    console.log(array_1.sort());
    console.log(array_1.reverse());
}