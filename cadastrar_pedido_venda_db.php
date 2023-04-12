<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Pedido de Venda</title>
</head>

<body>
    <?php
    include('menu.php');

    $id_cliente    = $_POST['id_cliente'];
    $id_funcionario    = $_POST['id_funcionario'];
    $data_pedido_venda   = $_POST['data_pedido_venda'];

    $sql = "INSERT INTO pedido_venda VALUES (null, '{$id_cliente}', '{$id_funcionario}', '{$data_pedido_venda}')";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        $id_pedido_venda = mysqli_insert_id($con);

        foreach ($_POST['id_produto'] as $id_produto) {
            $sql = "INSERT INTO item_pedido VALUES ('{$id_pedido_venda}', '{$id_produto}', '0', '0')";
            $query = mysqli_query($con, $sql);
        }

        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Pedido de Venda cadastrado com sucesso! Novo Pedido de Venda código: ' . $id_pedido_venda;
        }
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>