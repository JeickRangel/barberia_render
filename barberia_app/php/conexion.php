<?php
// conexion.php
// Archivo único de conexión a la base de datos MySQL (FreeSQLDatabase)

$host = "sql10.freesqldatabase.com";   // Servidor de FreeSQLDatabase
$user = "sql10807320";                 // Usuario generado
$pass = "rcs4P8M8LS";                  // Contraseña
$db   = "sql10807320";                 // Nombre de la base
$port = 3306;                          // Puerto estándar de MySQL

// Crear conexión con MySQL (con puerto incluido)
$conn = new mysqli($host, $user, $pass, $db, $port);

// Verificar si hay error de conexión
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// Configurar para usar UTF-8
$conn->set_charset("utf8mb4");

// ✅ Si llegaste aquí, la conexión fue exitosa
echo "✅ Conexión exitosa a la base de datos.";
?>
