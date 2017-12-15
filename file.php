<?php
$fp = fopen("./requestcod.log", "r");
$resultado = "";
while (!feof($fp)){
$resultado .= fgets($fp);
}
fclose($fp);
$resultado = explode('"',$resultado);
?>