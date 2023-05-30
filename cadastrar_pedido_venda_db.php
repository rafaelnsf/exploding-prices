<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Pedido de Venda</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            padding: 20px;
        }
    </style>

</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');

        $id_cliente    = $_POST['id_cliente'];
        $id_funcionario    = $_POST['id_funcionario'];
        $data_pedido_venda   = $_POST['data_pedido_venda'];
        $valor_pedido   = $_POST['valor_pedido'];
        $status   = $_POST['status'];

        $sql = "INSERT INTO pedido_venda VALUES (null, '{$data_pedido_venda}', '{$status}', '{$valor_pedido}', '{$id_cliente}', '{$id_funcionario}')";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            $id_pedido_venda = mysqli_insert_id($con);

            foreach ($_POST['id_produto'] as $id_produto) {
                $sql = "INSERT INTO item_pedido VALUES ('1', '{$id_produto}', '{$id_pedido_venda}', '100')";
                $query = mysqli_query($con, $sql);
            }

            if (!$query) {
                echo 'Erro no banco: ' . mysqli_error($con);
            } else {
                echo 'Pedido de Venda cadastrado com sucesso! Novo Pedido de Venda código: ' . $id_pedido_venda;
            }
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>