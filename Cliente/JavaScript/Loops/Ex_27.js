window.onload = function () {

    var class_map = new Map([ ["Jose", "Teacher"], 
    ["Lorenzo", "Teacher"], ["Nuria", "Student"], 
    ["Vicente", "Student"], ["Joaquin", "Student"], 
    ["Maria", "Student"] 
    ]);

    var user_name = prompt("Enter a name");

    var exists = false;

    var compareNames = (item, index) => {

        if (user_name.toLowerCase() == index.toLowerCase()) {
            console.log(`${user_name} is a ${item}`);
            exists = true;
        }

    }

    class_map.forEach(compareNames);

    if (exists == false) {
        console.log(`${user_name} doesn't exist in this data collection`);
    }

}