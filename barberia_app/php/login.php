<?php
require_once __DIR__ . "/cors.php"; // ✅ CORS solo aquí

header("Content-Type: application/json; charset=utf-8");
require_once "conexion.php";

// Si envías con FormData desde el frontend:
$data = $_POST;
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(["status" => "ERROR", "message" => "Faltan datos"]);
    exit;
}

$stmt = $conn->prepare("SELECT id, nombre, email, password_hash, rol_id FROM usuarios WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password_hash'])) {
        echo json_encode([
            "status" => "OK",
            "usuario" => [
                "id" => $row['id'],
                "nombre" => $row['nombre'],
                "correo" => $row['email'],
                "rol" => $row['rol_id']
            ]
        ]);
    } else {
        echo json_encode(["status" => "ERROR", "message" => "Contraseña incorrecta"]);
    }
} else {
    echo json_encode(["status" => "ERROR", "message" => "Usuario no encontrado"]);
}
