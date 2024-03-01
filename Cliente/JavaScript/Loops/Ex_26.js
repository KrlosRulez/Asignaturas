window.onload = function () {

    let arr = [], set = new Set();
    let users = ["Lorenzo", "Jose", "Mariluz", "Mariluz", "Anne", "Lorenzo", "Jose", "Mariluz", "Mariluz", "Lola"];

    for (let i = 0; i < users.length; i++) {
        arr.push(users[i]);
        set.add(users[i]);
    }

    let result;

    // console.time('Array');
    // result = arr.indexOf("Lola") !== -1;
    // console.timeEnd('Array');

    // console.time('Set');
    // result = set.has("Lola");
    // console.timeEnd('Set');

    var array_num = []; 
    var set_num = new Set();

    for (let i = 1; i <= 1000000; i++) {

        array_num.push(i);
        set_num.add(i);

    }

    console.time('Array');
    result = arr.indexOf(1) !== -1;
    console.timeEnd('Array');

    console.time('Set');
    result = set.has(1);
    console.timeEnd('Set');

    console.time('Array');
    result = arr.indexOf(1000000) !== -1;
    console.timeEnd('Array');

    console.time('Set');
    result = set.has(1000000);
    console.timeEnd('Set');

    console.time('Array');
    result = arr.indexOf(2000000) !== -1;
    console.timeEnd('Array');

    console.time('Set');
    result = set.has(2000000);
    console.timeEnd('Set');

}