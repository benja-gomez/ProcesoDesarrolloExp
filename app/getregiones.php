<?php
$host = '127.0.0.1'; 
$dbname = 'votacion'; 
$username = 'root'; 
$password = ''; 
$port = 3300; 

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$query = "SELECT id, region FROM regiones";
$result = $conn->query($query);

if ($result) {
    $regiones = array();

    while ($row = $result->fetch_assoc()) {
        $regiones[] = $row;
    }

    echo json_encode($regiones);
} else {
    echo "Error al obtener las regiones: " . $conn->error;
}

$conn->close();
?>
