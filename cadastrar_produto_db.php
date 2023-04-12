<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Produtos</title>
</head>

<body>
    <?php
    include('menu.php');

    $nome       = $_POST['nome'];
    $descricao        = $_POST['descricao'];
    $preco        = $_POST['preco'];
    $estoque        = $_POST['estoque'];
    $id_categoria = $_POST['id_categoria'];
    $status     = $_POST['status'];

    $sql = "INSERT INTO produto VALUES (null, '{$nome}','{$descricao}', '{$preco}', '{$estoque}' ,{$id_categoria}'{$status}')";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Produto cadastrado com sucesso! Novo produto código: ' . mysqli_insert_id($con);
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>