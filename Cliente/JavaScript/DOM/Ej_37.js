window.onload = function () {

    // 1 ###########################################################

    var section_container = document.getElementById("container");

    var new_parraf = document.createElement("p");

    new_parraf.innerText = "Viva el";

    section_container.appendChild(new_parraf);

    // 2 ###########################################################

    section_container = document.querySelector("section#container");

    var new_parrafaf = document.createElement("p");

    new_parrafaf.innerText = "Betis";

    section_container.appendChild(new_parrafaf);

    // 3 ###########################################################

    var class_second = document.querySelectorAll(".second");

    for (let value of class_second) {

        value.innerHTML = "<b>" + value.innerText + "</b>"

    }

    // 4 ###########################################################

    var class_third = document.querySelectorAll(".third");

    for (let value of class_third) {

        value.style.fontStyle = "italic";

    }

    // 5 ###########################################################

    var div_footer = document.getElementsByClassName("footer")[0];
    
    div_footer.classList.add("main");

    // 6 ###########################################################

    div_footer.classList.remove("footer");

    // 7 ###########################################################

    var four_li = document.createElement("li");

    four_li.innerText = "four";

    // 8 ###########################################################

    var the_ul = document.getElementsByTagName("ul")[0];

    the_ul.appendChild(four_li);

    // 9 ###########################################################

    var all_li = document.querySelectorAll("ol li");

    for (let value of all_li) {

        value.style.backgroundColor = "green";

    }

    // 10 ##########################################################

    var div_main = document.querySelector("div.main");

    div_main.remove();

}