<?php
// Configurações de conexão ao banco de dados MySQL
$host = "localhost";
$user = "root";
$password = "1234";
$dbname = "fishing_database";

try {
    // Criando a conexão usando PDO
    $conn = new PDO("mysql:host=$host", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("USE $dbname");
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}