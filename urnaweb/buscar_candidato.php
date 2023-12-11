<?php

// Detalhes da conexão
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bd_votacao';

// Conecta ao banco de dados
$conn = new mysqli($host, $user, $password, $db);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroCandidato = $_POST['numeroCandidato'];

    // Consulta SQL para obter os dados do candidato
    $sql = "SELECT nome, partido, numero FROM tb_candidato WHERE numero = $numeroCandidato";
    $result = $conn->query($sql);

    // Verifica se encontrou algum resultado
    if ($result != false){
        $row = $result->fetch_assoc();
        // Retorna os dados como JSON
        echo json_encode($row);
    } 
}

$conn->close();
?>