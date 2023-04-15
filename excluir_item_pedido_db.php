<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Itens do pedido</title>
</head>

<body>
    <?php
    include('menu.php');

    $id_produto   = $_GET['id_produto'];
    $id_pedido_venda = $_GET['id_pedido_venda'];
    $quantidade = $_GET['quantidade'];
    $valor_total = $_GET['valor_total'];

    $sql = "DELETE FROM item_venda WHERE id_produto = '{$id_produto}' AND id_pedido_venda = '{$id_pedido_venda}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Item do pedido excluido com sucesso!';
    }
    ?>
    <br><a href="alterar_pedido_venda.php?id=<?php echo $id_pedido_venda; ?>">Voltar para Pedido de Venda</a>
</body>

</html>
<?php
mysqli_close($con);
?>