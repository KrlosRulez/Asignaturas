<?php

// Quin valor es mostrarà? Per què?
// - 30 perque el echo $edat es del $edat de fora de la funció

// Definix una funció aniversari, extableix l'edat en 1 i tanca la funció
function aniversari() {
    $edat=1;
}

// Estableix que l'edat es 30
$edat=30;

// Invoca la funció
aniversari();

// Mostra l'edat
echo $edat;

?>