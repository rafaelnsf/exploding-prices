<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Produtos</title>
</head>

<body>
    <?php
    include('menu.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM produto WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Produto excluido com sucesso! Produto código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>