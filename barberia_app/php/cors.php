<?php
// cors.php

// Orígenes permitidos
$allowed_origins = [
    "http://localhost:5173",                     // Vite en desarrollo
    "https://appointmentappbarber.netlify.app",  // Frontend en producción
];

// Detectar origen de la petición
$origin = $_SERVER["HTTP_ORIGIN"] ?? "";

// Si el origen está permitido, se devuelve tal cual
if (in_array($origin, $allowed_origins)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Vary: Origin");
} else {
    // Si quieres permitir todo (no recomendado con cookies):
    // header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true); // si usas sesiones/cookies

// Manejar preflight OPTIONS
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204); // No Content
    exit;
}
