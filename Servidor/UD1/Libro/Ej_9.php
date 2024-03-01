<?php

// Quin valor es mostrarà? Per què?
// - 32 perque es sumen 2 a la varible al pasar dues vegades per la funció

// Definix la funció, definix edat com una variable estàtica, en suma un valor d'edat, mostra el valor de la variable
// estàtica edat i tanca la funció

function aniversari() {
    static $edat=$edat+1;

    echo $edat;
}

// Estableix que l'edat es 30
$edat=30;

// Invoca la funció dues vegades
aniversari();
aniversari();

// Mostra l'edat
echo $edat;

?>