window.onload = function () {

  var libros = [
    {
      title: "El Señor de los Anillos",
      author: "J.R.R. Tolkien",
      read: true,
      year: 1954,
    },
    {
      title: "Cien años de soledad",
      author: "Gabriel García Márquez",
      read: false,
      year: 1967,
    },
    {
      title: "Don Quijote de la Mancha",
      author: "Miguel de Cervantes",
      read: true,
      year: 1605,
    },
    {
      title: "Harry Potter y la piedra filosofal",
      author: "J.K. Rowling",
      read: false,
      year: 1997,
    },
    {
      title: "1984",
      author: "George Orwell",
      read: true,
      year: 1949,
    },
    {
      title: "Orgullo y prejuicio",
      author: "Jane Austen",
      read: false,
      year: 1813,
    },
    {
      title: "Crónica de una muerte anunciada",
      author: "Gabriel García Márquez",
      read: true,
      year: 1981,
    },
    {
      title: "El gran Gatsby",
      author: "F. Scott Fitzgerald",
      read: false,
      year: 1925,
    },
    {
      title: "Matar a un ruiseñor",
      author: "Harper Lee",
      read: true,
      year: 1960,
    },
    {
      title: "1984",
      author: "George Orwell",
      read: false,
      year: 1949,
    },
    {
      title: "Los juegos del hambre",
      author: "Suzanne Collins",
      read: true,
      year: 2008,
    },
    {
      title: "La sombra del viento",
      author: "Carlos Ruiz Zafón",
      read: false,
      year: 2001,
    },
    {
      title: "Anna Karenina",
      author: "León Tolstói",
      read: true,
      year: 1877,
    },
    {
      title: "La Odisea",
      author: "Homero",
      read: false,
      year: -800,
    },
    {
      title: "El Código Da Vinci",
      author: "Dan Brown",
      read: true,
      year: 2003,
    },
    {
      title: "Drácula",
      author: "Bram Stoker",
      read: false,
      year: 1897,
    },
    {
      title: "El Principito",
      author: "Antoine de Saint-Exupéry",
      read: true,
      year: 1943,
    },
    {
      title: "El nombre de la rosa",
      author: "Umberto Eco",
      read: false,
      year: 1980,
    },
    {
      title: "Rayuela",
      author: "Julio Cortázar",
      read: true,
      year: 1963,
    },
    {
      title: "Sapiens: De animales a dioses",
      author: "Yuval Noah Harari",
      read: false,
      year: 2011,
    },
    {
      title: "Los pilares de la Tierra",
      author: "Ken Follett",
      read: true,
      year: 1989,
    },
    {
      title: "La guerra y la paz",
      author: "León Tolstói",
      read: false,
      year: 1869,
    },
    {
      title: "Crimen y castigo",
      author: "Fiódor Dostoievski",
      read: true,
      year: 1866,
    },
    {
      title: "El retrato de Dorian Gray",
      author: "Oscar Wilde",
      read: false,
      year: 1890,
    },
    {
      title: "El Hobbit",
      author: "J.R.R. Tolkien",
      read: true,
      year: 1937,
    },
    {
      title: "Mujer en punto cero",
      author: "Nawal El Saadawi",
      read: false,
      year: 1975,
    },
    {
      title: "La metamorfosis",
      author: "Franz Kafka",
      read: true,
      year: 1915,
    },
    {
      title: "El señor de las moscas",
      author: "William Golding",
      read: false,
      year: 1954,
    },
    {
      title: "El silmarillion",
      author: "J.R.R. Tolkien",
      read: true,
      year: 1977,
    },
    {
      title: "Moby Dick",
      author: "Herman Melville",
      read: false,
      year: 1851,
    },
    {
      title: "Robocop",
      author: "Edward Neumeier",
      read: true,
      year: 1987,
    },
    {
      title: "Las uvas de la ira",
      author: "John Steinbeck",
      read: false,
      year: 1939,
    },
    {
      title: "Lo que el viento se llevó",
      author: "Margaret Mitchell",
      read: true,
      year: 1936,
    },
    {
      title: "El lobo estepario",
      author: "Hermann Hesse",
      read: false,
      year: 1927,
    },
    {
      title: "En busca del tiempo perdido",
      author: "Marcel Proust",
      read: true,
      year: 1913,
    },
    {
      title: "El señor de las moscas",
      author: "William Golding",
      read: false,
      year: 1954,
    },
    {
      title: "El perfume",
      author: "Patrick Süskind",
      read: true,
      year: 1985,
    },
    {
      title: "La insoportable levedad del ser",
      author: "Milan Kundera",
      read: false,
      year: 1984,
    },
    {
      title: "Los hermanos Karamazov",
      author: "Fiódor Dostoievski",
      read: true,
      year: 1880,
    },
    {
      title: "Cien años de soledad",
      author: "Gabriel García Márquez",
      read: false,
      year: 1967,
    },
  ];

  var body = document.getElementsByTagName("body")[0];

  for (let libro of libros) {

    let p = document.createElement("p");

    if (libro.read == true) {

        p.innerHTML = `You already read "${libro.title}" by ${libro.author}.`;

    } else {

        p.innerHTML = `You still need to read "${libro.title}" by ${libro.author}.`;

    }

    body.appendChild(p);

  }

}