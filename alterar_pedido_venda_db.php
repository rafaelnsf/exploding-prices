<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Pedido de Venda</title>
</head>

<body>
    <?php
    include('menu.php');

    $id            = $_POST['id'];
    $id_cliente    = $_POST['id_cliente'];
    $id_funcionario   = $_POST['id_funcionario'];
    $data_pedido = $_POST['data_pedido'];
    $status = $_POST['status'];
    $valor_pedido = $_POST['valor_pedido'];

    $sql = "UPDATE pedido_venda SET id_cliente = '{$id_cliente}', id_funcionario = '{$id_funcionario}', data_pedido = '{$data_pedido}', status = '{$status}', valor_pedido ='{$valor_pedido} WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        $id_pedido_venda = mysqli_insert_id($con);

        $sql = "DELETE FROM item_pedido WHERE id_pedido_venda = '{$id}'";
        $query = mysqli_query($con, $sql);

        foreach ($_POST['id_produto'] as $id_produto) {
            $sql = "INSERT INTO item_pedido VALUES ('{$id}', '{$id_produto}', '1','0')";
            $query = mysqli_query($con, $sql);
        }

        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Pedido alterado com sucesso! Pedido código: ' . $id;
        }
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>