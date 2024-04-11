<?php

$mysqli = new mysqli("127.0.0.1:3300", "root", "", "votacion");
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

?>

