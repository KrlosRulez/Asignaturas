window.onload = function () {

    var body = document.getElementsByTagName("body")[0];

    var br = document.createElement("br");

    var form = document.createElement("form");

    var input_text = document.createElement("input");

    input_text.type = "text";

    form.appendChild(input_text);

    form.appendChild(br);

    var input_radio_1 = document.createElement("input");
    var input_radio_2 = document.createElement("input");
    var input_radio_3 = document.createElement("input");

    input_radio_1.type = "radio";
    input_radio_2.type = "radio";
    input_radio_3.type = "radio";

    input_radio_1.name = "radio";
    input_radio_2.name = "radio";
    input_radio_3.name = "radio";

    var label_radio_1 = document.createElement("label");
    var label_radio_2 = document.createElement("label");
    var label_radio_3 = document.createElement("label");

    label_radio_1.innerText = "One";
    label_radio_2.innerText = "Two";
    label_radio_3.innerText = "Three";

    form.appendChild(input_radio_1);
    form.appendChild(label_radio_1);

    form.appendChild(input_radio_2);
    form.appendChild(label_radio_2);

    form.appendChild(input_radio_3);
    form.appendChild(label_radio_3);

    body.appendChild(form);

}