<?php 

  echo "Hoy es: " . date("d/m/Y") . "<br />";  
  echo "Este mes tiene: " . date("t") . " dias" . "<br />";
  echo "Semana del año: " . date("W") . "<br />";
  echo "Hoy es: " . date("d - F - Y") . "<br />";
  echo "Dia de la semana: " . date("l") . "<br />";
  echo "Son las: " . date("h:i:sa") . "<br />";
  echo "Dia del año: " . date("z") . "<br />";
  echo "Dia de la semana: " . date("N") . "<br />";
  echo "Horario de verano (1 = Si, 2 = No): " . date("I") . "<br />";
  echo "Abreviatura zona horaria: " . date("T") . "<br />"; 
  echo "Fecha Completa: " . date("D j F Y") . "<br />";

  echo "<br /><br />";

  $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
  echo $formatter->format(time());

?>