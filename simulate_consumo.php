<?php
include '../connect.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Simulação de dados de consumo
$dispositivos = ['Lampada', 'Geladeira', 'Ar Condicionado', 'Televisao', 'Computador'];

$dispositivo = $dispositivos[array_rand($dispositivos)];
$consumo = rand(1, 10); // Consumo aleatório entre 1 e 10 kWh

$sql = "INSERT INTO consumo (dispositivo, consumo) VALUES ('$dispositivo', '$consumo')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "dispositivo" => $dispositivo, "consumo" => $consumo]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
