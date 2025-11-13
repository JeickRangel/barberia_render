<?php
// cors.php

$allowed_origins = [
    "http://localhost:5173",                     // Vite en desarrollo
    "https://appointmentappbarber.netlify.app",  // Frontend en producción
];

$origin = $_SERVER["HTTP_ORIGIN"] ?? "";

// Si el origen está en la lista, lo permitimos
if (in_array($origin, $allowed_origins)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Vary: Origin");
} else {
    // Si quisieras abrirlo a todos (no recomendado con cookies):
    // header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Manejar preflight OPTIONS
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204); // No Content
    exit;
}
