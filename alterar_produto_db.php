<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Produto</title>
</head>

<body>
    <?php
    include('menu.php');

    $id     = $_POST['id'];
    $nome     = $_POST['nome'];
    $descricao    = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $id_categoria      = $_POST['idCategoria'];

    $sql = "UPDATE produto SET nome = '{$nome}', email = '{$email}', descricao = '{$descricao}', preco = '{$preco}', estoque = '{$estoque}', id_categoria= '{$id_categoria}' WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Produto alterado com sucesso! Produto alterado código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>