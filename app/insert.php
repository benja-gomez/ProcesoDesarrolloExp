<?php
require 'conexion.php';

function validarRUT($rut) {
    if (preg_match('/^[0-9]{7,8}-[0-9kK]{1}$/', $rut)) {
        return true;
    }
    return false;
}

// Validación de checkboxes (asegurar que se seleccionen un máximo de 2)
$selectedOptions = $_POST['options'];
if (count($selectedOptions) > 2) {
    echo json_encode(array('error' => true, 'message' => 'Por favor, selecciona un máximo de 2 opciones.'));
    exit;
}

// Combina los valores seleccionados de `options` en un string separado por comas
$nosotros = implode(',', $selectedOptions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nombreyapellido']) && !empty($_POST['rut']) && !empty($_POST['email']) && !empty($_POST['region']) && !empty($_POST['comuna']) && !empty($_POST['candidato']) && !empty($_POST['options'])) {
        
        // Validación de correo electrónico
        foreach ($_POST['email'] as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('error' => true, 'message' => 'El correo electrónico ingresado no es válido.'));
                exit;
            }
        }
        
        // Validación del RUT
        foreach ($_POST['rut'] as $rut) {
            if (!validarRUT($rut)) {
                echo json_encode(array('error' => true, 'message' => 'El RUT ingresado no es válido. Debe contener un guion antes del dígito verificador.'));
                exit;
            }
        }

        foreach ($_POST['region'] as $key => $regionId) {
            $query = "SELECT region FROM regiones WHERE id = ?";
            $stmtRegion = $mysqli->prepare($query);
            $stmtRegion->bind_param("i", $regionId);
            $stmtRegion->execute();
            $result = $stmtRegion->get_result();
            $regionData = $result->fetch_assoc();
            $regionName = $regionData['region'];

            $sql = "INSERT INTO votacion (nombreyapellido, alias, rut, email, region, comuna, candidato, nosotros) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param("ssssssss", $_POST['nombreyapellido'][$key], $_POST['alias'][$key], $_POST['rut'][$key], $_POST['email'][$key], $regionName, $_POST['comuna'][$key], $_POST['candidato'][$key], $nosotros);
                $stmt->execute();
            }
            $stmt->close();
            $stmtRegion->close();
        }
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true, 'message' => 'Todos los campos son obligatorios.'));
    }
} else {
    echo json_encode(array('error' => true, 'message' => 'No se recibió una solicitud POST.'));
}

$mysqli->close();
?>
