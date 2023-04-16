<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Pedidos de Compras</title>
    <style type="text/css" rel="stylesheet">
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <a href="cadastrar_pedido_compra.php">Cadastrar</a>
    <?php
    $sql = "SELECT pc.id, pc.data_pedido_compra, pc.valor_compra, pc.id_fornecedor, pc.status, f.razao_social AS nome_fornecedor
			FROM pedido_compra AS pc
			INNER JOIN fornecedor AS f ON (pc.id_fornecedor = f.id)";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fornecedor</th>
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
                        <td><?php echo $arr['nome_fornecedor']; ?></td>
                        <td><?php echo $arr['data_pedido_compra']; ?></td>
                        <td><?php echo $arr['valor_compra']; ?></td>
                        <td><?php echo $arr['status']; ?></td>
                        <td>
                            <a href="alterar_pedido_compra.php?id=<?php echo $arr['id']; ?>">Alterar</a>

                            <a href="excluir_item_compra_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
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
</body>

</html>
<?php
mysqli_close($con);
?>