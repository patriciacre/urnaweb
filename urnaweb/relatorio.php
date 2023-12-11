<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Votos</title>
    <style>
		table {
			width:100%;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
			text-align: left;
		}
		table#t01 tr:nth-child(even) {
			background-color: #eee;
		}
		table#t01 tr:nth-child(odd) {
		   background-color:#fff;
		}
		table#t01 th {
			background-color: black;
			color: white;
		}

		a {
    		text-decoration: none;
		}
	</style>
</head>
<body>
    <div>
        <h3>RELATÓRIO DE VOTOS</h3>

        <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'bd_votacao';

        $conexao = mysqli_connect($host, $user, $password, $db);

        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        $sql = "SELECT numero, nome, votos FROM tb_candidato";
        $tabela = mysqli_query($conexao, $sql) 
          or die(mysqli_error($conexao));

        $dados_candidato = '';
        
        while ($linha = mysqli_fetch_row($tabela)) {
            $dados_candidato = $linha;
        }
        ?>
             <p>PRESIDENTE</p>

            <?php
										
                $sql = "SELECT numero, nome, votos FROM tb_candidato";
                $tabela = mysqli_query($conexao, $sql) 
                  or die(mysqli_error($conexao));					
									
				echo '<table class="w3-table-all">
						<thead>
						    <tr class="w3-red">
						        <th>Número</th>
						        <th>Nome</th>
						        <th>Votos</th>											
							</tr>
						</thead>';
										
				while ($linha = mysqli_fetch_row($tabela) and $linha[1] != "Branco"){							
					echo '<tr>
						<td>'.$linha[0].'</td>
						<td>'.$linha[1].'</td>
						<td>'.$linha[2].'</td>												
						</tr>';
				}			
				echo '</table>';
				$sql = "SELECT * FROM tb_candidato WHERE nome = 'Branco'";
                $tabela = mysqli_query($conexao, $sql) 
                  or die(mysqli_error($conexao));	
				echo '<br>';
				while ($linha = mysqli_fetch_row($tabela)){							
					echo 'BRANCOS: ' .$linha[5];
				}  
            ?>
        <br>
        <br>
        <a href="zerarvotacao.php"><img style="height:40px" src="imagens/icone_zerar.png"></img>Zerar Votação</a>
        <a href="index.php"><img style="height:40px" src="imagens/icone_voltar.png"></img>Voltar ao  menu</a>

        <br>
    </div>
</body>
</html>
