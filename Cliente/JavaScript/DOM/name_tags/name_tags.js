window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    // Sólo para 3 nombres

    var array_names = [];

    var user_greeting = prompt("Enter a greeting", "my name is...");

    for (let i = 0; i <= 2; i++) {

        let user_name = prompt("Enter the name of a celebrity");

        array_names.push(user_name);

        let actual_div = body.querySelectorAll("body div.name-tag")[i];

        let div_h1 = actual_div.querySelector("h1");
        let p_h1 = actual_div.querySelector("p");

        div_h1.innerText = user_greeting;
        p_h1.innerText = array_names[i];

    }
    

    // ##################

    // // Dinámico

    // var user_name = "";

    // var array_names = [];

    // var user_greeting = prompt("Enter a greeting", "my name is...");

    // var contador = 0;

    // do {

    //     user_name = prompt("Enter the name of a celebrity (Enter 'stop' to stop)");

    //     if (user_name == "stop") {

    //         break;

    //     } else {

    //         if (contador > 2) {

    //             let new_div = document.createElement("div");

    //             new_div.innerHTML = "<h1></h1><p></p>";

    //             new_div.classList = "name-tag";

    //             body.appendChild(new_div);

    //         }

    //         array_names.push(user_name);

    //         let actual_div = body.querySelectorAll("body div.name-tag")[contador];
    
    //         let div_h1 = actual_div.querySelector("h1");
    //         let p_h1 = actual_div.querySelector("p");
    
    //         div_h1.innerText = user_greeting;
    //         p_h1.innerText = array_names[contador];

    //     }

    //     contador++;

    // } while (user_name != "stop");

    // ##################

}