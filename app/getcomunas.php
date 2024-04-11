<?php
require 'conexion.php';

$regionId = isset($_GET['regionId']) ? intval($_GET['regionId']) : 0;

if ($regionId > 0) {
    $sql = "SELECT id, comuna FROM comunas WHERE region_id = ?";

    $stmt = $mysqli->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $regionId);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $comunas = [];
        
        while ($row = $result->fetch_assoc()) {
            $comunas[] = array(
                'id' => $row['id'],
                'comuna' => $row['comuna']
            );
        }
        echo json_encode($comunas);

        // Cierra el `stmt`
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqli->error;
    }
} else {
    echo "Parámetro `regionId` inválido.";
}

$mysqli->close();

?>
