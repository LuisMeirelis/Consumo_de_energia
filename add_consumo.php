<?php
// Inclua seu arquivo de conexão ao banco de dados
include '../connect.php'; // Ajuste o caminho conforme a estrutura

if (isset($_GET['current'])) {
    $current = $_GET['current'];

    // Checar a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserir dados na tabela
    $sql = "INSERT INTO consumo (dispositivo, consumo, data_registro) VALUES ('Dispositivo', $current, NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Parâmetro 'current' não recebido.";
}
?>
