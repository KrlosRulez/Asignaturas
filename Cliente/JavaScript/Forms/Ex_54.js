window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    // console.log(form.innerHTML);

    var p_data = document.createElement("p");

    var submit_button = document.getElementById("submit-button");

    body.appendChild(p_data);

    function mostrarDatos () {

        var user_name = document.getElementById("input-name").value;
        console.log(user_name);
        var user_password = document.getElementById("input-password").value;
        var user_age = document.getElementById("input-age").value;
        var user_interests = document.getElementsByClassName("check"); // Array
        var user_genders = document.getElementsByClassName("radio"); // Array
        var user_countries = document.querySelectorAll("#select-country > option");   // Array
        var user_comments = document.getElementById("textarea-comments").value;

        var actual_interests = [];

        var final_gender = "Unknown";
    
        var final_country = "Unknown";
    
        for (let interest of user_interests) {
    
            if (interest.checked) {
    
                actual_interests.push(interest.value);
    
            }
    
        }
    
        for (let gender of user_genders) {
    
            if (gender.checked) {
    
                final_gender = gender.value;
    
            }
    
        }
    
        for (let country of user_countries) {
    
            if (country.selected) {
    
                final_country = country.value;
    
            }
    
        }

        p_data.innerHTML = 
        `Name: ${user_name}
        <br /><br />Password: ${user_password}
        <br /><br />Age: ${user_age}
        <br /><br />Interest: ${actual_interests}
        <br /><br />Gender: ${final_gender}
        <br /><br />Country: ${final_country}
        <br /><br />Comments: ${user_comments}`;

    }

    function borrarDatos () {

        p_data.innerHTML = "";

    }

    submit_button.addEventListener("click", function(event) {

        event.preventDefault();

        borrarDatos();
        mostrarDatos();

    });



}