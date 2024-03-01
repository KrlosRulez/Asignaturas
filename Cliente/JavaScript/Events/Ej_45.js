window.onload = function () {

    var button1 = document.getElementById("btn1");
    var button2 = document.getElementById("btn2");
    var button3 = document.getElementById("btn3");
    var button4 = document.getElementById("btn4");

    var images = document.getElementsByTagName("img");

    button1.onclick = function () {
       images[0].scrollIntoView({behavior: 'smooth'}); 
    }

    button2.onclick = function () {
        images[1].scrollIntoView({behavior: 'smooth'});  
    }

    button3.onclick = function () {
        images[2].scrollIntoView({behavior: 'smooth'});  
    }

    button4.onclick = function () {

        var array_src = [];

        for (let value of images) {

            array_src.push(value.src);

            value.src = "";

        }

        console.log(array_src);

        for (let i = 0; i < images.length; i++) {

            let usado = false;

            while (usado == false) {

                let num_random = Math.floor((Math.random() * images.length));

                if (array_src[num_random] != "") {

                    images[i].src = array_src[num_random];
    
                    array_src[num_random] = "";

                    usado = true;
    
                } 

            }

        }

    }

}