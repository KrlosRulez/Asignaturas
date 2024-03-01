window.onload = function () {

    var players_array = [
        {
            "img": "players/LeBron.jpg",
            "name": "LeBron James",
            "position": "Small Forward",
            "age": 38,
            "PPG": 28.3
        },
        {
            "img": "players/Wade.jpg",
            "name": "Dwayne Wade",
            "position": "Shooting Guard",
            "age": 34,
            "PPG": 22.1
        },
        {
            "img": "players/Durant.jpg",
            "name": "Kevin Durant",
            "position": "Small Forward",
            "age": 33,
            "PPG": 25.6
        },
        {
            "img": "players/Bosh.jpg",
            "name": "Chris Bosh",
            "position": "Power Forward",
            "age": 31,
            "PPG": 19.7
        },
        {
            "img": "players/Nowitzki.jpg",
            "name": "Dirk Nowitzki",
            "position": "Power Forward",
            "age": 41,
            "PPG": 15.4
        }
    ];

    var body = document.getElementsByTagName("body")[0];

    var container_div = document.createElement("div");
    container_div.classList.add("container");
    container_div.style.display = "inline";

    body.appendChild(container_div);

    for (let value of players_array) {

        var card_div = document.createElement("div");
        card_div.classList.add("card");

        // Div Imagen

        var image_div = document.createElement("div");
        image_div.classList.add("image");
        card_div.appendChild(image_div);

        var img_player = document.createElement("img");
        img_player.src = value.img;
        image_div.appendChild(img_player);

        // Div Nombre

        var player_name = document.createElement("div");
        player_name.classList.add("name");
        player_name.innerHTML = `<p>${value.name}</p>`;
        card_div.appendChild(player_name);

        // Crear <ul>

        var un_list = document.createElement("ul");
        card_div.appendChild(un_list);

        // Añadir <li>

        var li_position = document.createElement("li");
        li_position.innerText = value.position;
        un_list.appendChild(li_position);

        var li_age = document.createElement("li");
        li_age.innerText = value.age + " years";
        un_list.appendChild(li_age);

        var li_PPG = document.createElement("li");
        li_PPG.innerText = value.PPG + " points per game";
        un_list.appendChild(li_PPG);

        // Botón Borrar

        var remove_button = document.createElement("button");
        remove_button.innerText = "Remove";
        card_div.appendChild(remove_button);

        // Añadir Carta

        container_div.appendChild(card_div);

    }

}