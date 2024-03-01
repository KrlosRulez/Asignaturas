window.onload = function () {

  // Variables de filtros

  var order = null;

  var max_price = null;

  var processor_selected = null;

  var filtered_array;

  var final_array;

  // Array inicial con ordenadores

  var array_laptops = [
    {
      brand: "HP",
      model: "Pavilion",
      RAM: 8,
      processor: "Intel Core i5",
      hardDisk: "512GB SSD",
      price: 799.99,
    },
    {
      brand: "Dell",
      model: "Inspiron",
      RAM: 16,
      processor: "AMD Ryzen 7",
      hardDisk: "1TB HDD",
      price: 899.99,
    },
    {
      brand: "Lenovo",
      model: "ThinkPad",
      RAM: 8,
      processor: "Intel Core i7",
      hardDisk: "256GB SSD",
      price: 899.99,
    },
    {
      brand: "Asus",
      model: "VivoBook",
      RAM: 8,
      processor: "Intel Core i3",
      hardDisk: "128GB SSD",
      price: 599.99,
    },
    {
      brand: "Acer",
      model: "Swift",
      RAM: 16,
      processor: "AMD Ryzen 5",
      hardDisk: "512GB SSD",
      price: 849.99,
    },
    {
      brand: "Apple",
      model: "MacBook Air",
      RAM: 8,
      processor: "Apple M1",
      hardDisk: "256GB SSD",
      price: 1199.99,
    },
    {
      brand: "Microsoft",
      model: "Surface Laptop",
      RAM: 16,
      processor: "Intel Core i5",
      hardDisk: "256GB SSD",
      price: 1299.99,
    },
    {
      brand: "Samsung",
      model: "Galaxy Book",
      RAM: 8,
      processor: "Intel Core i7",
      hardDisk: "512GB SSD",
      price: 799.99,
    },
    {
      brand: "Toshiba",
      model: "Satellite",
      RAM: 8,
      processor: "AMD Ryzen 3",
      hardDisk: "1TB HDD",
      price: 699.99,
    },
    {
      brand: "Sony",
      model: "VAIO",
      RAM: 16,
      processor: "Intel Core i7",
      hardDisk: "1TB SSD",
      price: 1499.99,
    },
  ];

  var processor_options = []; // Array con opciones de procesadores

  // Filtros

  var span_brand = document.getElementById("order-brand");

  span_brand.addEventListener("click", function() {

    order = "brand";

    draw(order, max_price, processor_selected);

  });

  var span_ram = document.getElementById("order-ram");

  span_ram.addEventListener("click", function() {

    order = "ram";

    draw(order, max_price, processor_selected);

  });

  var input_max_price = document.getElementById("max-price");

  var button_max_price = document.getElementById("price-filter");

  button_max_price.addEventListener("click", function() {

    max_price = input_max_price.value;

    draw(order, max_price, processor_selected);

  });

  function changeEditForm() {

    let div_left = document.getElementById("left"); // Contenedor donde aparecen los formularios

    let form_edit = document.getElementById("form-edit"); // Formulario para editar ordenador

    let clon = form_edit.cloneNode(true); // Clonar formulario de editar

    div_left.appendChild(clon); // Añadir nuevo formulario de editar al contenedor de formularios

    form_edit.remove(); // Eliminar antiguo formulario de editar al contenedor de formularios

    let new_form_edit = document.getElementById("form-edit"); // Nuevo formulario añadido

    new_form_edit.style.display = "block";  // Hacer visible el nuevo formulario

    hideAdd();  // Esconder formulario de añadir (en caso de que esté abierto)

  }

  function loadProcessorOptions() {

    let select_processor = document.getElementById("select-processor"); // Select con las opciones de procesador

    select_processor.innerHTML = "";  // Vaciar antes de añadir opciones

    // Convertir a Set y Array para eliminar duplicados

    let set = new Set(processor_options);

    let final_processor_options = Array.from(set);

    // Crear un option para cada posición del Array

    for (let processor of final_processor_options) {

      let new_option = document.createElement("option");

      new_option.value = processor;

      new_option.innerText = processor;

      new_option.classList.value = "processor-option";

      select_processor.appendChild(new_option);

    }

  }

  var input_select_processor = document.getElementById("select-processor");

  var button_select_processor = document.getElementById("processor-filter");

  button_select_processor.addEventListener("click", function () {

    processor_selected = input_select_processor.value;

    draw(order, max_price, processor_selected);

  });

  var button_remove_filters = document.getElementById("remove-filters");

  button_remove_filters.addEventListener("click", function() {

    order = null;

    max_price = null;
    input_max_price.value = "";

    processor_selected = null;

    draw(order, max_price, processor_selected);

  });

  function draw(order, max_price, processor_selected) {

    let div_cards = document.getElementById("cards"); // Contenedor al que se añadirán las tarjetas

    let temp = document.getElementById("template"); // Plantilla que se copiará para crear tarjetas

    div_cards.innerHTML = ""; // Vaciar el contenido previo del contenedor

    processor_options = [];

    for (laptop of array_laptops) {

      processor_options.push(laptop.processor);

    }

    // Orden y filtros

    if (order == "brand") {

      array_laptops.sort(function(a, b) { // Ordenar alfabéticamente
      
        let x = a.brand.toLowerCase();
        let y = b.brand.toLowerCase();

        if (x < y) {

          return -1;

        } else if (x > y) {

          return 1;

        } else {

          return 0;

        }
      
      })
      

    } else if (order == "ram") {

      array_laptops.sort(function(a, b) {return b.RAM - a.RAM;});  // Ordenar de mayor a menor RAM

    }

    if (max_price != null && max_price != "") {

      filtered_array = array_laptops.filter(function(x) {return x.price < max_price;});

    } else {

      filtered_array = [...array_laptops];

    }

    if (processor_selected != null && processor_selected != "") {

      final_array = filtered_array.filter(function(x) {return x.processor == processor_selected;});

    } else {

      final_array = [...filtered_array];

    }

    // Se creará una tarjeta por cada objeto del array

    for (let laptop of final_array) {

      // Crear Tarjetas

      let clon = temp.content.cloneNode(true);

      let card_brand = clon.querySelector(".brand");
      card_brand.innerText = `Brand: ${laptop.brand}`;

      let card_model = clon.querySelector(".model");
      card_model.innerText = `Model: ${laptop.model}`;

      let card_ram = clon.querySelector(".ram");
      card_ram.innerText = `RAM: ${laptop.RAM} GB`;

      let card_processor = clon.querySelector(".processor");
      card_processor.innerText = `Processor: ${laptop.processor}`;

      let card_HD = clon.querySelector(".hard-disk");
      card_HD.innerText = `Hard Disk: ${laptop.hardDisk}`;

      let card_price = clon.querySelector(".price");
      card_price.innerText = `Price: ${laptop.price} €`;

      // Añadir Listeners a los botones de borrar

      let remove_button = clon.querySelector(".remove-button"); // Botón de borrar tarjeta

      remove_button.addEventListener("click", function () {

        (this.parentNode).remove(); // Borrar tarjeta

        array_laptops.splice((array_laptops.indexOf(laptop)), 1); // Borrar objeto del array

        hideEdit(); // Esconder formulario de editar (en caso de que esté abierto)

        console.log(array_laptops); // Mostrar array en la consola

      });

      // Añadir Listeners a los botones de editar

      let edit_button = clon.querySelector(".edit-button"); // Botón de editar tarjeta

      edit_button.addEventListener("click", function () {

        changeEditForm(); // Crear formulario para editar solo la tarjeta pulsada

        // Variables del formulario de editar

        let brand_options = document.querySelectorAll("#form-edit option"); 

        for (let brand of brand_options) {

          if (brand.innerText == laptop.brand) {

            brand.selected = true;

          }

        }

        let edit_model = document.getElementById("edit-model");
        edit_model.value = laptop.model;

        let ram_options = document.querySelectorAll("#form-edit input.edit-ram");

        for (let ram of ram_options) {

          if (ram.value == laptop.RAM) {

            ram.checked = true;

          }

        }

        let edit_processor = document.getElementById("edit-processor");
        edit_processor.value = laptop.processor;

        let edit_HD = document.getElementById("edit-hard-disk");
        edit_HD.value = laptop.hardDisk;

        let edit_price = document.getElementById("edit-price");
        edit_price.value = laptop.price;

        let edit_laptop = document.getElementById("edit-laptop");

        // Añadir listener al botón del formulario de editar

        edit_laptop.addEventListener("click", function (event) {

          event.preventDefault(); // Eliminar comportamiento por defecto del botón

          // Editar atributos del objeto del array

          for (let brand of brand_options) {

            if (brand.selected == true) {

              laptop.brand = brand.value;

            }

          }

          laptop.model = edit_model.value;

          for (let ram of ram_options) {

            if (ram.checked == true) {

              laptop.RAM = parseInt(ram.value);

            }

          }

          laptop.processor = edit_processor.value;
          laptop.hardDisk = edit_HD.value;
          laptop.price = parseInt(edit_price.value);

          if (processor_selected != null && processor_selected != "") {

            processor_selected = edit_processor.value;  // Filtrar con el nuevo procesador elegido

          }

          draw(order, max_price, processor_selected); // Volver a pintar todas las tarjetas

          hideEdit(); // Ocultar formulario de editar

        });

      });

      div_cards.appendChild(clon);  // Añadir tarjeta al contenedor de tarjetas

    }

    loadProcessorOptions(); // Añadir los procesadores existentes a las opciones del filtro

    // Marcar como seleccionado el procesador elegido

    let options_processor = input_select_processor.querySelectorAll(".processor-option");
    
    for (let processor of options_processor) {
    
      if (processor.value == processor_selected) {
    
        processor.selected = true;
        break;
    
      }
    
    }

    console.log(array_laptops); // Mostrar array en la consola

  }

  draw(order, max_price, processor_selected); // Pintar todas las tarjetas

  // Guardar nuevo ordenador

  var form_add = document.getElementById("content-add");  // Formulario de añadir ordenador
  var add_button = document.getElementById("add-laptop"); // Botón de añadir ordenador

  function showAdd() {

    form_add.style.display = "block"; // Mostrar formulario de añadir
    add_button.innerText = "Save";  // Cambiar texto del botón

    hideEdit(); // Esconder formulario de editar (en caso de que esté abierto)

  }

  function hideAdd() {

    form_add.style.display = "none";  // Esconder formulario de añadir
    add_button.innerText = "New laptop";  // Cambiar texto del botón

  }

  function hideEdit() {

    let form_edit = document.getElementById("form-edit"); // Formulario de editar ordenador
    form_edit.style.display = "none"; // Esconder formulario de editar

  }

  hideAdd();  // Al iniciar, ocultar formulario de añadir

  add_button.addEventListener("click", function (event) {

    event.preventDefault(); // Eliminar comportamiento normal del botón

    // Variables del formulario de añadir

    let brand_options = form_add.querySelectorAll("option");
    let add_brand;
    let add_model = document.getElementById("add-model");
    let ram_options = document.querySelectorAll(".add-ram");
    let add_ram;
  
    let add_processor = document.getElementById("add-processor");
    let add_HD = document.getElementById("add-hard-disk");
    let add_price = document.getElementById("add-price");

    if (add_button.innerText == "Save") {

      for (let brand of brand_options) {

        if (brand.selected) {
          add_brand = brand.value;
        }

      }

      for (let ram of ram_options) {

        if (ram.checked) {
          add_ram = ram.value;
        }

      }

      // Crear nuevo objeto 

      var new_laptop = {
        brand: `${add_brand}`,
        model: `${add_model.value}`,
        RAM: parseInt(add_ram),
        processor: `${add_processor.value}`,
        hardDisk: `${add_HD.value}`,
        price: parseInt(add_price.value),
      }

      array_laptops.push(new_laptop); // Añadir objeto al array

      // Vaciar campos del formulario de añadir

      brand_options[0].selected = true;
      ram_options[0].checked = true;
      add_model.value = "";
      add_ram.value = "";
      add_processor.value = "";
      add_HD.value = "";
      add_price.value = "";

      draw(order, max_price, processor_selected); // Volver a pintar todas las tarjetas

      hideAdd();  // Esconder formulario de añadir

      console.log(array_laptops); // Mostrar array en consola

    } else {

      showAdd();  // Si está oculto, mostrar formulario de añadir

    }

  });

}