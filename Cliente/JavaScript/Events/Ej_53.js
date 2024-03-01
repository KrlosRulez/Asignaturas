window.onload = function () {

    var libros = [
      {
        title: "El Señor de los Anillos",
        author: "J.R.R. Tolkien",
        read: true,
        year: 1954,
        image: "images/image1.jpg",
      },
      {
        title: "Cien años de soledad",
        author: "Gabriel García Márquez",
        read: false,
        year: 1967,
        image: "images/image2.jpg",
      },
      {
        title: "Don Quijote de la Mancha",
        author: "Miguel de Cervantes",
        read: true,
        year: 1605,
        image: "images/image3.jpg",
      },
      {
        title: "Harry Potter y la piedra filosofal",
        author: "J.K. Rowling",
        read: false,
        year: 1997,
        image: "images/image4.jpg",
      },
      {
        title: "1984",
        author: "George Orwell",
        read: true,
        year: 1949,
        image: "images/image5.jpg",
      },
      {
        title: "Orgullo y prejuicio",
        author: "Jane Austen",
        read: false,
        year: 1813,
        image: "images/image1.jpg",
      },
      {
        title: "Crónica de una muerte anunciada",
        author: "Gabriel García Márquez",
        read: true,
        year: 1981,
        image: "images/image2.jpg",
      },
      {
        title: "El gran Gatsby",
        author: "F. Scott Fitzgerald",
        read: false,
        year: 1925,
        image: "images/image3.jpg",
      },
      {
        title: "Matar a un ruiseñor",
        author: "Harper Lee",
        read: true,
        year: 1960,
        image: "images/image4.jpg",
      },
      {
        title: "1984",
        author: "George Orwell",
        read: false,
        year: 1949,
        image: "images/image5.jpg",
      },
      {
        title: "Los juegos del hambre",
        author: "Suzanne Collins",
        read: true,
        year: 2008,
        image: "images/image1.jpg",
      },
      {
        title: "La sombra del viento",
        author: "Carlos Ruiz Zafón",
        read: false,
        year: 2001,
        image: "images/image2.jpg",
      },
      {
        title: "Anna Karenina",
        author: "León Tolstói",
        read: true,
        year: 1877,
        image: "images/image3.jpg",
      },
      {
        title: "La Odisea",
        author: "Homero",
        read: false,
        year: -800,
        image: "images/image4.jpg",
      },
      {
        title: "El Código Da Vinci",
        author: "Dan Brown",
        read: true,
        year: 2003,
        image: "images/image5.jpg",
      },
      {
        title: "Drácula",
        author: "Bram Stoker",
        read: false,
        year: 1897,
        image: "images/image1.jpg",
      },
      {
        title: "El Principito",
        author: "Antoine de Saint-Exupéry",
        read: true,
        year: 1943,
        image: "images/image2.jpg",
      },
      {
        title: "El nombre de la rosa",
        author: "Umberto Eco",
        read: false,
        year: 1980,
        image: "images/image3.jpg",
      },
      {
        title: "Rayuela",
        author: "Julio Cortázar",
        read: true,
        year: 1963,
        image: "images/image4.jpg",
      },
      {
        title: "Sapiens: De animales a dioses",
        author: "Yuval Noah Harari",
        read: false,
        year: 2011,
        image: "images/image5.jpg",
      },
      {
        title: "Los pilares de la Tierra",
        author: "Ken Follett",
        read: true,
        year: 1989,
        image: "images/image1.jpg",
      },
      {
        title: "La guerra y la paz",
        author: "León Tolstói",
        read: false,
        year: 1869,
        image: "images/image2.jpg",
      },
      {
        title: "Crimen y castigo",
        author: "Fiódor Dostoievski",
        read: true,
        year: 1866,
        image: "images/image3.jpg",
      },
      {
        title: "El retrato de Dorian Gray",
        author: "Oscar Wilde",
        read: false,
        year: 1890,
        image: "images/image4.jpg",
      },
      {
        title: "El Hobbit",
        author: "J.R.R. Tolkien",
        read: true,
        year: 1937,
        image: "images/image5.jpg",
      },
      {
        title: "Mujer en punto cero",
        author: "Nawal El Saadawi",
        read: false,
        year: 1975,
        image: "images/image1.jpg",
      },
      {
        title: "La metamorfosis",
        author: "Franz Kafka",
        read: true,
        year: 1915,
        image: "images/image2.jpg",
      },
      {
        title: "El señor de las moscas",
        author: "William Golding",
        read: false,
        year: 1954,
        image: "images/image3.jpg",
      },
      {
        title: "El silmarillion",
        author: "J.R.R. Tolkien",
        read: true,
        year: 1977,
        image: "images/image4.jpg",
      },
      {
        title: "Moby Dick",
        author: "Herman Melville",
        read: false,
        year: 1851,
        image: "images/image5.jpg",
      },
      {
        title: "Robocop",
        author: "Edward Neumeier",
        read: true,
        year: 1987,
        image: "images/image1.jpg",
      },
      {
        title: "Las uvas de la ira",
        author: "John Steinbeck",
        read: false,
        year: 1939,
        image: "images/image2.jpg",
      },
      {
        title: "Lo que el viento se llevó",
        author: "Margaret Mitchell",
        read: true,
        year: 1936,
        image: "images/image3.jpg",
      },
      {
        title: "El lobo estepario",
        author: "Hermann Hesse",
        read: false,
        year: 1927,
        image: "images/image4.jpg",
      },
      {
        title: "En busca del tiempo perdido",
        author: "Marcel Proust",
        read: true,
        year: 1913,
        image: "images/image5.jpg",
      },
      {
        title: "El señor de las moscas",
        author: "William Golding",
        read: false,
        year: 1954,
        image: "images/image1.jpg",
      },
      {
        title: "El perfume",
        author: "Patrick Süskind",
        read: true,
        year: 1985,
        image: "images/image2.jpg",
      },
      {
        title: "La insoportable levedad del ser",
        author: "Milan Kundera",
        read: false,
        year: 1984,
        image: "images/image3.jpg",
      },
      {
        title: "Los hermanos Karamazov",
        author: "Fiódor Dostoievski",
        read: true,
        year: 1880,
        image: "images/image4.jpg",
      },
      {
        title: "Cien años de soledad",
        author: "Gabriel García Márquez",
        read: false,
        year: 1967,
        image: "images/image5.jpg",
      },
    ];
  
    var body = document.getElementsByTagName("body")[0];
  
    var div;
  
    for (let libro of libros) {
  
      div = document.createElement("div");
  
      if (libro.read == true) {
  
          div.className = "read";
  
      } else {
  
          div.className = "not-read";
  
      }
  
      let img = document.createElement("img");
  
      img.src = libro.image;
      img.width = 400;
      img.height = 250;
  
      div.appendChild(img);
  
      var h1_titulo = document.createElement("h1");
  
      h1_titulo.innerText = libro.title;
  
      div.appendChild(h1_titulo);
  
      var p_autor = document.createElement("p");
  
      p_autor.innerText = libro.author;
  
      div.appendChild(p_autor);

      div.addEventListener("click", function() {

        if (libro.read == true) {

            libro.read = false;
            this.classList = "not-read";

            console.log("Cambiado a no leido");
            console.log(libro.read);

        } else {

            libro.read = true;
            this.classList = "read";

            console.log("Cambiado a leido");
            console.log(libro.read);
        }

      });
  
      body.appendChild(div);
  
    }
  
  }