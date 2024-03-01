window.onload = function () {

    $nested_array = [
        {
            id: 1,
            album_title: "My F*cking Album",
            artist: "Robocop",
            track_list: [
                "Los gemelos reforman dos veces",
                "Making Of: Tortilla Arguiñano",
                "El power ranger azul es escocés"
            ]
        },
        {
            id: 2,
            album_title: "Vota PSOE",
            artist: "Pedro Sánchez",
            track_list: [
                "Soy un poliedro",
                "Beneficio Político",
                "Me limpio la mano"
            ]
        },
        {
            id: 3,
            album_title: "Back from the Dead",
            artist: "El Fary",
            track_list: [
                "A que huelen los petas",
                "Falete: héroe o villano",
                "Salgo un jueves y vuelvo un martes"
            ]
        },
        {
            id: 4,
            album_title: "AQUI EL NOMBRE?",
            artist: "Kiko Rivera",
            track_list: [
                "Yo madrugar, poco",
                "Encontré un trabajo y lo devolví",
                "Una vez me dió un ictus"
            ]
        }
    ];

    $user_number = (parseInt(prompt(`Enter an ID Number (1-${$nested_array.length})`, "4")) - 1);

    if ($user_number >= 0 && $user_number < $nested_array.length) {

        document.write(
            `ID del álbum: ${$nested_array[$user_number].id} <br />
            Título del álbum: ${$nested_array[$user_number].album_title} <br />
            Nombre del artista: ${$nested_array[$user_number].artist} <br />
            Canciones: `
        );

        for (let i = 0; i < ($nested_array[$user_number].track_list).length; i++) {

            if (i == (($nested_array[$user_number].track_list).length) - 1) {
                document.write(`${$nested_array[$user_number].track_list[i]}.`);
            } else {
                document.write(`${$nested_array[$user_number].track_list[i]}, `);
            }

        }

    } else {
        document.write("Esa ID no existe");
    }

}