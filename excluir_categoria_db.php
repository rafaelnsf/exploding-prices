<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Categoria</title>
</head>

<body>
    <?php
    include('menu.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM categoria WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Categoria excluido com sucesso! Categoria Codigo: '. $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>