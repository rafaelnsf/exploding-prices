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
    $id_pedido_compra = $_GET['id_pedido_compra'];

    $sql = "DELETE FROM item_compra WHERE id_produto = '{$id_produto}' AND id_pedido_compra = '{$id_pedido_venda}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Item da compra excluido com sucesso!';
    }
    ?>
    <br><a href="alterar_pedido_compra.php?id=<?php echo $id_pedido_compra; ?>">Voltar para Pedido de Compra</a>
</body>

</html>
<?php
mysqli_close($con);
?>