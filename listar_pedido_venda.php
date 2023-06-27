<?php
include('conexao.php');
include('valida_sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Pedidos de Vendas</title>
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
                    url: 'buscar_pedido_venda.php',
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
        <h1>Pedidos de Venda</h1>
        <a class="btn" href="cadastrar_pedido_venda.php">Cadastrar</a>
        <form id="formBusca">
            <input type="text" name="termo" placeholder="Digite o que busca">
            <button type="submit">Buscar</button>
        </form>
        <?php
        $sql = "SELECT pv.id, pv.data_pedido_venda, pv.valor_pedido, pv.id_cliente, pv.status, c.nome AS nome_cliente
			FROM pedido_venda AS pv
			INNER JOIN cliente AS c ON (pv.id_cliente = c.id)";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
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
                            <td><?php echo $arr['nome_cliente']; ?></td>
                            <td><?php echo $arr['data_pedido_venda']; ?></td>
                            <td><?php echo $arr['valor_pedido']; ?></td>
                            <td><?php echo $arr['status']; ?></td>
                            <td>
                                <a class="btn alterar" href="alterar_pedido_venda.php?id=<?php echo $arr['id']; ?>">Alterar</a>
                                
                                <a class="btn delete" href="excluir_pedido_venda_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
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