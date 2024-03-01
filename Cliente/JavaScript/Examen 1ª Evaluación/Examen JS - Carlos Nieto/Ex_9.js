window.onload = function () {

    var total_price_number = 0.0;

    var array_cart = [];

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

            // Listener al botón de +

            let button_add = clon.querySelector(".plusBtn");

            button_add.addEventListener("click", function (event) {

                event.preventDefault();

                let exists = false;

                let item_to_change;

                for (let actual_item of array_cart) {

                    if (actual_item.name == item.name) {

                        exists = true;

                        //console.log(array_cart[array_cart.indexOf(actual_item)]);

                        item_to_change = array_cart[array_cart.indexOf(actual_item)];

                    }

                }

                if (exists == false) {

                    let item_cart = {
                        id: item.id,
                        name: item.name,
                        price: parseFloat(item.price),
                        image: item.image,
                        quantity: 1
                    }

                    array_cart.push(item_cart);

                } else {

                    item_to_change.quantity += 1;

                }

                loadCart();

            });

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

    // Añadir al carrito

    var total_price = document.getElementById("total-price");
    total_price.innerText = "Total: 0.00€";

    var temp_cart = document.getElementById("temp-cart");

    var div_items_cart = document.getElementById("items-cart");

    function loadCart() {

        console.log(array_cart);

        div_items_cart.innerHTML = "";

        total_price_number = 0.0;

        total_price.innerText = `Total: ${total_price_number}€`;

        for (let item_cart of array_cart) {

            let clon = temp_cart.content.cloneNode(true);

            let item_details = clon.querySelector(".item-details");
            item_details.innerText = `${item_cart.quantity} x ${item_cart.name} - ${item_cart.price}€`;

            total_price_number += item_cart.price;

            total_price.innerText = `Total: ${total_price_number}€`;

            div_items_cart.appendChild(clon);

        }
        
    }

    // Botón empty

    var button_empty = document.getElementById("emptyBtn");
    
    button_empty.addEventListener("click", function () {

        array_cart = [];

        loadCart();

    });

}