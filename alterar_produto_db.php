<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Produto</title>
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
        include('valida_sessao.php');

        $id     = $_POST['id'];
        $nome     = $_POST['nome'];
        $descricao    = $_POST['descricao'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $id_categoria      = $_POST['id_categoria'];
        $status      = $_POST['status'];

        $sql = "UPDATE produto SET nome = '{$nome}', descricao = '{$descricao}', preco = '{$preco}', estoque = '{$estoque}', id_categoria= '{$id_categoria}' , status = '{$status}'WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Produto alterado com sucesso! Produto alterado código: ' . $id;
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>