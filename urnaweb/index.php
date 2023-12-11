<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Simulador de Urna Eletrônica </title>
        <link rel="stylesheet" href="estilos.css">
    </head>

    <body>
        <div class="centralizar">
            <h1> Simulador de Urna Eletrônica </h1>
        </div>
        <div class="esquerda">
            <p> Selecione para qual cargo deseja votar: </p>
            
            <input type="radio" name="rdbCargo" id="rdbPresidente" value="1" checked="true"/>
			<label for="rdbPresidente">Presidente</label><br>
            <br>
            <div class="layout">
                <a href="urnaweb.php" class="link_sombra"> Selecionar </a>
            </div>

            <br>

            <br>
            <a href="relatorio.php"><img style="height:40px" src="imagens/icone_relatorio.png"></img>Relatório de Votos</a>
        </div>    
    </body>
</html>
