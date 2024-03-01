window.onload = function () {

    var array_items = [
        {
            id: 1,
            name: "Engine Oil ELF Evolution",
            price: 13.49,
            image: "oil.jpg"
        },
        {
            id: 2,
            name: "Fuel Additive Wynn's 325 ml",
            price: 9.89,
            image: "additive.jpg"
        },
        {
            id: 3,
            name: "Snow chain G size (x2)",
            price: 32.95,
            image: "chains.jpg"
        },
        {
            id: 4,
            name: "Battery charger 6V/12V",
            price: 28.99,
            image: "charger.jpg"
        },
        {
            id: 5,
            name: "Emergency light V16",
            price: 14.99,
            image: "light.jpg"
        },
    ];

    var main = document.getElementById("items");

    var temp = document.getElementById("temp");

    function draw() {

        main.innerHTML = "";

        for (let item of array_items) {

            let clon = temp.content.cloneNode(true);

            let clon_img = clon.querySelector("img");
            clon_img.src = `img/${item.image}`;

            let clon_name = clon.querySelector("strong");
            clon_name.innerText = item.name;

            let clon_price = clon.querySelector(".item-price");
            clon_price.innerText = `${item.price}€`;

            main.appendChild(clon);

        }

    }

    draw();

    // Añadir nuevo item

    var button_new = document.getElementById("newBtn");

    var input_name = document.getElementById("productName");
    var input_price = document.getElementById("productPrice");

    button_new.addEventListener("click", function (event) {

        event.preventDefault();

        let new_id = array_items.length + 1;
        let new_name = input_name.value;
        let new_price = parseFloat(input_price.value);
        let new_img = "noimage.png";

        if (input_name.value == "" || input_price.value == "") {

            input_name.placeholder = "required";
            input_price.placeholder = "required";

        } else {

            let new_item = {
                id: new_id,
                name: new_name,
                price: new_price,
                image: new_img
            }

            array_items.push(new_item);

            input_name.value = "";
            input_price.value = "";

            input_name.placeholder = "";
            input_price.placeholder = "";

            //console.log(array_items);

        }

        draw();

    });

}