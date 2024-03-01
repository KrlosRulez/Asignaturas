window.onload = function () {

    var getStringLists = (dataArray) => { return typeof dataArray === 'string'; }

    const RandomArray = [1, "Betis", 23, "Pako"];

    const filteredArray = RandomArray.filter(getStringLists);

    console.log(filteredArray); 

}