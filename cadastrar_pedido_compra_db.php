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

        $id_fornecedor    = $_POST['id_fornecedor'];
        $data_pedido_compra   = $_POST['data_pedido_compra'];
        $valor_compra   = $_POST['valor_compra'];
        $status   = $_POST['status'];

        $sql = "INSERT INTO pedido_compra VALUES (null, '{$status}', '{$id_fornecedor}', '{$valor_compra}', '{$data_pedido_compra}')";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            $id_pedido_compra = mysqli_insert_id($con);

            foreach ($_POST['id_produto'] as $id_produto) {
                $sql = "INSERT INTO item_compra VALUES ('1', '{$id_produto}', '{$id_pedido_compra}', '100')";
                $query = mysqli_query($con, $sql);
            }

            if (!$query) {
                echo 'Erro no banco: ' . mysqli_error($con);
            } else {
                echo 'Pedido de Compra cadastrado com sucesso! Novo Pedido de Compra código: ' . $id_pedido_compra;
            }
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>