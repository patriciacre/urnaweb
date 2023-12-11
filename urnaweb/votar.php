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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o valor do voto do formulário
    $voto = $_POST["voto"];

    if ($voto == 1){
        // Insere o voto no banco de dados
        $sql = "UPDATE tb_candidato SET votos = votos + 1 WHERE nome = 'Branco'";
        $result = $conexao->query($sql);
        echo '<script>';
        echo 'alert("Voto contabilizado com sucesso!");';
        echo 'setTimeout(function() { window.location.href = "index.php"; }, 1000);'; // Redirecionamento após 1 segundo
        echo '</script>';
    } elseif ($voto == 2){
        header("Location: urnaweb.php");
    } else {
        // Pega o numero do candidato da URL
        $numero = isset($_POST['numero_candidato']) ? $_POST['numero_candidato'] : null;
        // Consulta os candidatos para o cargo selecionado
        if ($numero !== '') {
        $sql = "SELECT * FROM tb_candidato WHERE numero = $numero";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            $sql = "UPDATE tb_candidato SET votos = votos + 1 WHERE numero = $numero";
            $result = $conexao->query($sql);
            echo '<script>';
            echo 'alert("Voto contabilizado com sucesso!");';
            echo 'setTimeout(function() { window.location.href = "index.php"; }, 1000);'; // Redirecionamento após 1 segundo
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Selecione um candidato válido!");';
            echo 'setTimeout(function() { window.location.href = "urnaweb.php"; }, 1000);'; // Redirecionamento após 1 segundo
            echo '</script>';
        }
        } else {
            echo '<script>';
            echo 'alert("Digite um número de candidato!");';
            echo 'setTimeout(function() { window.location.href = "urnaweb.php"; }, 1000);'; // Redirecionamento após 1 segundo
            echo '</script>';
        }
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

?>
