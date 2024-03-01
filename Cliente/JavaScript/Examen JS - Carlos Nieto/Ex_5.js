window.onload = function () {

    var nested_array = [
        {
            "title": "Libro 1",
            "author": "Autor 1",
            "publishedYear": 2005,
            "isBestSeller": true
        },
        {
            "title": "Libro 2",
            "author": "Autor 2",
            "publishedYear": 2010,
            "isBestSeller": false
        },
        {
            "title": "Libro 3",
            "author": "Autor 3",
            "publishedYear": 2015,
            "isBestSeller": true
        },
        {
            "title": "Libro 4",
            "author": "Autor 4",
            "publishedYear": 2020,
            "isBestSeller": false
        }
    ];

    nested_array[0]["genre"] = "Action";
    nested_array[1]["genre"] = "Mystery";
    nested_array[2]["genre"] = "Science Fiction";
    nested_array[3]["genre"] = "Adventures";

    function printInfo(book) {

        var info_log = `Title: ${book["title"]}
        \nAuthor: ${book["author"]}
        \nPublished Year: ${book["publishedYear"]}
        \n¿Bestseller?: ${book["isBestSeller"]}` ;

        console.log(info_log);

        var info_doc = `Title: ${book["title"]}
        <br />Author: ${book["author"]}
        <br />Published Year: ${book["publishedYear"]}
        <br />¿Bestseller?: ${book["isBestSeller"]}
        <br />Genre: ${book["genre"]}` ;

        return info_doc;

    }

    var user_year = parseInt(prompt("Enter a year", "2010"));

    var found = false;

    for (let value of nested_array) {

        if (value["publishedYear"] == user_year) {
            document.write(printInfo(value));
            found = true;
        }

    }

    if (found == false) {
        alert(`There isn't books published in ${user_year}`);
    }

}