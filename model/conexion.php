<?php
require("config.php");

function Conexion()
{
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("No se puede conectar a la base de datos" . mysqli_connect_error());
    mysqli_set_charset($conexion, "utf8");
    return $conexion;
}
