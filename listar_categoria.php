<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Categorias</title>
    <link rel="stylesheet" href="style_tables.css">
    <script type="text/javascript" src="jquery-3.7.0.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
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
                url: 'buscar_categoria.php',
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
        <h1>Categorias</h1>
        <a class="btn" href="json_categorias_encode.php" target="_blank">JSON</a>
        <a class="btn" href="cadastrar_categoria.php">Cadastrar</a>

        <form id="formBusca">
            <input type="text" name="termo" placeholder="Digite o que busca">
            <button type="submit">Buscar</button>
        </form>

        <?php
        $sql = "SELECT * FROM categoria";
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
                        <th>Status</th>

                        <th></th>
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
                            <td><?php echo $arr['status']; ?></td>
                            <td>
                                <a class="btn alterar" href="alterar_categoria.php?id=<?php echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a class="btn delete" href="excluir_categoria_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            Total: <?php echo mysqli_num_rows($query); ?> item(s)
        <?php
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>