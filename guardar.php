<?php
header('Content-Type: application/json');

// Datos de conexión a la base de datos
$hostname = 'sql204.infinityfree.com';
$username = 'if0_38289037';
$password = 'Marcosk8k975r';
$database = 'if0_38289037_invitados';

// Crear conexión
$conn = new mysqli($hostname, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . $conn->connect_error]));
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$invitados = $_POST['invitados'];
$mensaje = $_POST['mensaje'];

// Validar datos
if (empty($nombre) || empty($invitados) || empty($mensaje)) {
    echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
    exit;
}

// Insertar datos en la base de datos
$sql = "INSERT INTO invitados (nombre, num_invitados, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sis', $nombre, $invitados, $mensaje);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Datos guardados correctamente.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al guardar los datos: ' . $stmt->error]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>