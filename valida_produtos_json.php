<?php
include('conexao.php');
include('valida_sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Valida Produtos JSON</title>
    <link rel="stylesheet" href="style_tables.css">
</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        ?>
        <h1>Produtos</h1>

        <div id="tabela-produtos"></div>
    </div>

    <script type="text/javascript" src="./jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'json_produtos_encode.php',
                method: 'GET',
            }).done(function(dados) {
                var itens = JSON.parse(dados);
                var tabela = $('<table>');
                var cabecalho = $('<tr>').append(
                    $('<th>').text('ID'),
                    $('<th>').text('Nome'),
                    $('<th>').text('Descrição'),
                    $('<th>').text('Preço'),
                    $('<th>').text('Estoque'),
                    $('<th>').text('ID Categoria'),
                    $('<th>').text('Status')
                );
                tabela.append(cabecalho);

                $.each(itens, function(index, item) {
                    var linha = $('<tr>').append(
                        $('<td>').text(item.id),
                        $('<td>').text(item.nome),
                        $('<td>').text(item.descricao),
                        $('<td>').text(item.preco),
                        $('<td>').text(item.estoque),
                        $('<td>').text(item.id_categoria),
                        $('<td>').text(item.status)
                    );
                    tabela.append(linha);
                });

                $('#tabela-produtos').append(tabela);
            }).fail(function() {
                console.log('Erro ao obter os dados dos produtos.');
            });
        });
    </script>
</body>

</html>
<?php
mysqli_close($con);
?>