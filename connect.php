<?php
$host = 'localhost';
$db = 'energia_db'; // Nome do banco de dados
$user = 'root'; // Usuário do MySQL
$pass = ''; // Senha do MySQL

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
