<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Pedidos</title>
</head>

<body>
    <?php
    include('menu.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM item_compra WHERE id_pedido_compra = '{$id}'";
    $query = mysqli_query($con, $sql);

    $sql = "DELETE FROM pedido_compra WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Pedido excluido com sucesso! Pedido código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>