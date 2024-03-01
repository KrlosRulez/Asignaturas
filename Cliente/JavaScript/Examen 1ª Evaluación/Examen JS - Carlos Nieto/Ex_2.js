window.onload = function () {

    var directionsDropdown = document.getElementById("directionsDropdown");
    var options = directionsDropdown.querySelectorAll("option");

    var array_options = [];

    for (let option of options) {

        array_options.push(option.value);

    }

    const updateOptions = () => {

        for (let option of options) {

            if (array_options.includes(option.value)) {

                option.style.display = "block";

            } else {

                option.style.display = "none";

            }

        }

    }

    var checkboxes = document.getElementsByTagName("input");

    for (let checkbox of checkboxes) {

        checkbox.addEventListener("click", function () {

            if (!(checkbox.checked)) {

                array_options.splice(array_options.indexOf(checkbox.id), 1);
                checkbox.checked = false;
    
            } else {
    
                array_options.push(checkbox.id);
                checkbox.checked = true;
    
            }

            updateOptions();

        });

    }

}