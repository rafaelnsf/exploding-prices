<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Pedidos de Vendas</title>
    <style type="text/css" rel="stylesheet">
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
        }

        .conteudo {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        ?>
        <a href="cadastrar_pedido_venda.php">Cadastrar</a>
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
                                <a href="alterar_pedido_venda.php?id=<?php echo $arr['id']; ?>">Alterar</a>

                                <a href="excluir_pedido_venda_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
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