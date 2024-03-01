<?php

// Quin valor es mostrarà? Per què?
// 31 perque es suma 30 + 1 de la funció

// Definix una funció aniversari, definix $edat en 1 i tanca la funció
function aniversari() {
    global $edat;

    $edat=$edat + 1;
}

// Estableix que l'edat es 30
$edat=30;

// Invoca la funció
aniversari();

// Mostra l'edat
echo $edat;

?>