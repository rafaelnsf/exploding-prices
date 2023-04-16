<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Pedido de Compra</title>
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

    $id            = $_POST['id'];
    $id_fornecedor   = $_POST['id_fornecedor'];
    $data_pedido_compra = $_POST['data_pedido_compra'];
    $status = $_POST['status'];
    $valor_compra = $_POST['valor_compra'];

    $sql = "UPDATE pedido_compra SET id_fornecedor = '{$id_fornecedor}', data_pedido_compra = '{$data_pedido_compra}', status = '{$status}', valor_compra ='{$valor_compra}' WHERE id = '{$id}';";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        $id_pedido_compra = mysqli_insert_id($con);

        $sql = "DELETE FROM item_compra WHERE id_pedido_compra = '{$id}'";
        $query = mysqli_query($con, $sql);

        foreach ($_POST['id_produto'] as $id_produto) {
            $sql = "INSERT INTO item_compra VALUES ('{$id}', '{$id_produto}', '1','0')";
            $query = mysqli_query($con, $sql);
        }

        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Pedido alterado com sucesso! Pedido código: ' . $id;
        }
    }
    ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>