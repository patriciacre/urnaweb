<?php
// Detalhes da conexão
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'bd_votacao';

// Conecta ao banco de dados
$conexao = mysqli_connect($host, $user, $password, $db);

// Verifica a conexão
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Zera todos os votos no banco de dados
$sql_reset_votes = "UPDATE tb_candidato SET votos = 0";
mysqli_query($conexao, $sql_reset_votes);

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

// Redireciona de volta para a página principal após a zeragem dos votos
header("Location: relatorio.php");
exit();
?>
