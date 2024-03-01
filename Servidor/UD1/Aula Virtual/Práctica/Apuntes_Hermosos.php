<?php 

// CONVERTIR STRING EN ARRAY
$array_string = str_split($string); // SI SE UTILIZA, USAR array_diff_assoc / array_intersect_assoc

// ORDENAR ARRAYS DE MENOR A MAYOR (POR VALOR)
asort($array);

// ORDENAR ARRAYS DE MENOR A MAYOR (POR CLAVE)
ksort($array);

// ORDENAR ARRAYS EN ORDEN ALFABÉTICO
sort($array);

// LONGITUD DEL ARRAY
count($array);

// SUMAR VALORES DEL ARRAY
array_sum($array);

// DEVOLVER EL ARRAY INVERSO
array_reverse($array);

// INSERTAR DATOS EN ARRAY
array_push($array, "datos", "mas_datos");

// BORRAR ÚLTIMO ELEMENTO DEL ARRAY
array_pop($array);

// COMPROBAR SI ESA CLAVE EXISTE
array_key_exists("nombre_clave", $array);

// COMPARAR VALORES DE DOS ARRAYS Y DEVOLVER COINCIDENCIAS
array_intersect($array_1, $array_2);

// COMPARAR VALORES Y CLAVES DE DOS ARRAYS Y DEVOLVER COINCIDENCIAS
// DEBEN COINCIDIR CLAVES Y VALORES PARA NO TENER DIFERENCIAS
array_intersect_assoc($array_1, $array_2);

// BUSCAR SI UN VALOR ESTÁ EN EL ARRAY
in_array("valor_buscado", $array);

// COMPARAR VALORES DE DOS ARRAYS Y DEVOLVER DIFERENCIAS
array_diff($array_1, $array_2);

// COMPARAR VALORES Y CLAVES DE DOS ARRAYS Y DEVOLVER DIFERENCIAS
// DEBEN COINCIDIR CLAVES Y VALORES PARA NO TENER DIFERENCIAS
array_diff_assoc($array_1, $array_2);

// Ejemplo array_diff / array_diff_assoc

$diferencia = array_diff($array_1, $array_2);

if ($diferencia == 0) {
    echo "Los arrays son iguales";
} else {
    echo "Los arrays son diferentes";
}

?>