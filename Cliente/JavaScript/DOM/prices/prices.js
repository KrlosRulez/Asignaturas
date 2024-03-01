window.onload = function () {

    var ul_advanced = document.querySelector("div#adv ul.list");

    console.log(ul_advanced.innerHTML);

    var five_li = document.createElement("li");

    five_li.innerText = "365 Phone support";

    ul_advanced.appendChild(five_li);

    // #########################################################

    var div_adv = document.getElementById("adv");

    var contenido_adv = div_adv.innerHTML;

    var div_lite = document.getElementById("lite");

    var contenido_lite = div_lite.innerHTML;

    div_adv.innerHTML = contenido_lite;

    div_lite.innerHTML = contenido_adv;

    div_adv.id = "lite";

    div_lite.id = "adv";

    // #########################################################

    var button_advanced = document.querySelector("div#adv button.btn");

    button_advanced.style.color = "white"; 
    button_advanced.style.backgroundColor = "#005090"; 
    button_advanced.innerText = "Start Now";

}