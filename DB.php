<?php
$host = 'localhost';
$bd = 'mapa';
$usuario = 'root';
$contrasenia = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasenia);
    if($conexion){ echo "Conectado... a sistema";}
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>