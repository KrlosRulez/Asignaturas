window.onload = function () {

    // San José = 19 de Marzo

    $dia_san_jose = new Date(2024, 2, 19);
    
    $hoy = Date.now();

    $tiempo_ms = ($dia_san_jose - $hoy);

    // console.log(`MS Restantes: ${$tiempo_ms}`);

    $tiempo_dias = Math.floor(($tiempo_ms / 86400000));

    console.log(`Días Restantes: ${$tiempo_dias}`);

}