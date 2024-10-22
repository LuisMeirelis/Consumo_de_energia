<?php
// Inclua seu arquivo de conexão ao banco de dados
include '../connect.php'; // Ajuste o caminho conforme a estrutura

// Checar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para obter dados da tabela consumo
$sql = "SELECT * FROM consumo ORDER BY data_registro DESC"; // Você pode ajustar a consulta conforme necessário
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Busca os dados
    while($row = $result->fetch_assoc()) {
        $data[] = $row; // Adiciona cada linha ao array de dados
    }
} else {
    echo "0 results";
}

// Retorna os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
