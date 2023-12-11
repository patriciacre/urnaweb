<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Votação para Presidente </title>
        <link rel="stylesheet" href="estilos.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <style>
            /* Adicione estilos para o quadro */
            #quadroDados {
                border: 2px solid #000; /* Cor e largura da borda */
                padding: 10px; /* Espaçamento interno do quadro */
                border-radius: 10px; /* Borda arredondada */
            }
        </style>
    </head>
    <body>
        <div class="centralizaBlue">
            <h2> VOTAÇÃO PARA PRESIDENTE </h2>
        </div>
        <br><br>
        <div class="button-container">
            <form action="votar.php" method="post">
                <p> Digite o número do seu candidato: <input type="text" id="numero_candidato" name="numero_candidato" oninput="buscarCandidato()"> </p>
                    
                <div id="quadroDados">
                    <div id="dadosCandidato">
                        <p><img style="height:100px" src="imagens/ninguem.jpg" alt="Imagem Genérica"><strong>NÚMERO DE CANDIDATO INEXISTENTE</strong></p>
                    </div>
                </div>
        
                <br>
                <button type="submit" name="voto" value="1" style="background-color: white; color: black;" > Branco </button>
                <button type="submit" name="voto" value="2" style="background-color: orange; color: black;"> Corrigir </button>
                <button type="submit" name="voto" value="3" style="background-color: green; color: black;"> Confirmar </button>
            </form>
        </div>
        <br>
        <div class="direita">
            <a href="index.php"><img style="height:40px" src="imagens/icone_voltar.png"> Voltar ao menu</a>
        </div>            
        <script>
            $(document).ready(function () {
                // Adiciona um ouvinte de eventos de input à caixa de texto
                $('#numero_candidato').on('input', function () {
                    buscarCandidato(); // Chama a função para buscar o candidato ao digitar
                });
            });

            function buscarCandidato() {
                var numeroCandidato = $('#numero_candidato').val();
                    
                if (!numeroCandidato) {
                    // Exibe a imagem genérica se o campo estiver vazio
                    exibirCandidatoInexistente();
                    return;
                }

                // Realize uma solicitação Fetch para obter os dados do candidato do PHP
                fetch('buscar_candidato.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'numeroCandidato=' + numeroCandidato,
                })
                .then(response => response.json())
                .then(data => {
                    // Atualize a div 'dadosCandidato' com os dados do candidato
                    if (data != null) {
                        var primeiroNome = data.nome.split(' ')[0];
                        $('#dadosCandidato').html('<img style="height:100px" src="imagens/' + primeiroNome + '.jpg" alt="Foto do Candidato">' +
                            '<strong>CANDIDATO NÚMERO: </strong>' + data.numero + '<br> <br> <strong>Nome: </strong>' + data.nome + '<br> <strong>Partido: </strong>' + data.partido);
                    } else {
                        // Se não encontrar dados do candidato, mantenha a imagem e mensagem padrão
                        exibirCandidatoInexistente();
                    }
                })
                .catch(error => console.error('Erro:', error));
            }

            function exibirCandidatoInexistente() {
                // Exibe a imagem genérica e mensagem para número de candidato inexistente
                $('#dadosCandidato').html('<p><img style="height:100px" src="imagens/ninguem.jpg" alt="Imagem Genérica"><strong>NÚMERO DE CANDIDATO INEXISTENTE</strong></p>');
            }
        </script>
    </body>
</html>