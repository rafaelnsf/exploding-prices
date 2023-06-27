<?php
include('conexao.php');
include('valida_sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Produtos</title>
    <link rel="stylesheet" href="style_tables.css">
    <script type="text/javascript" src="jquery-3.7.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Manipula o clique no botão de excluir
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var row = $(this).closest('tr');
                if (confirm('Você realmente deseja excluir este item?')) {
                    $.ajax({
                        url: href,
                        type: 'GET',
                        success: function(result) {
                            row.remove();
                        }
                    });
                }
            });

            $('#formBusca').submit(function(e) {
                e.preventDefault();
                var termo = $('input[name="termo"]').val();

                $.ajax({
                    url: 'buscar_produtos.php',
                    type: 'GET',
                    data: { termo: termo },
                    success: function(result) {
                        $('table tbody').html(result);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        ?>
        <h1>Produtos</h1>
        <a class="btn" href="json_produtos_encode.php" target="_blank">JSON</a>
        <a class="btn" href="cadastrar_produto.php">Cadastrar</a>

        <form id="formBusca">
            <input type="text" name="termo" placeholder="Digite o que busca">
            <button type="submit">Buscar</button>
        </form>

        <?php
        $sql = "SELECT * FROM produto";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Status</th>
                        <th>Categoria</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $arr['id']; ?></td>
                            <td><?php echo $arr['nome']; ?></td>
                            <td><?php echo $arr['descricao']; ?></td>
                            <td><?php echo $arr['preco']; ?></td>
                            <td><?php echo $arr['estoque']; ?></td>
                            <td><?php echo $arr['status']; ?></td>
                            <td><?php echo $arr['id_categoria']; ?></td>
                            <td>
                                <a class="btn alterar" href="alterar_produto.php?id=<?php echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a class="btn delete" href="excluir_produto_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            Total: <?php echo mysqli_num_rows($query); ?> Produto(s)
        <?php
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>