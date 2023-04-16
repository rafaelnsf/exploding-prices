<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Pedidos</title>
    <style type="text/css" rel="stylesheet">
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

    $id = $_GET['id'];

    $sql = "DELETE FROM item_pedido WHERE id_pedido_venda = '{$id}'";
    $query = mysqli_query($con, $sql);

    $sql = "DELETE FROM pedido_venda WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Pedido excluido com sucesso! Pedido código: ' . $id;
    }
    ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>