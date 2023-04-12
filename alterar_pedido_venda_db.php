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
    $data_coleta   = $_POST['data_coleta'];
    $data_prevista = $_POST['data_prevista'];
    $data_entrega  = $_POST['data_entrega'];

    $sql = "UPDATE locacao SET id_cliente = '{$id_cliente}', data_coleta = '{$data_coleta}', data_prevista = '{$data_prevista}', data_entrega = '{$data_entrega}' WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        $id_locacao = mysqli_insert_id($con);

        $sql = "DELETE FROM locacao_item WHERE id_locacao = '{$id}'";
        $query = mysqli_query($con, $sql);

        foreach ($_POST['id_midia'] as $id_midia) {
            $sql = "INSERT INTO locacao_item VALUES ('{$id}', '{$id_midia}')";
            $query = mysqli_query($con, $sql);
        }

        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Locação alterada com sucesso! Locação código: ' . $id;
        }
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>