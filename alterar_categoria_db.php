<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Categoria</title>
</head>

<body>
    <?php
    include('menu.php');

    $id     = $_POST['id'];
    $nome     = $_POST['nome'];
    $descricao    = $_POST['descricao'];
    $status      = $_POST['status'];

    $sql = "UPDATE produto SET nome = '{$nome}', descricao = '{$descricao}', status = '{$status}'WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Categoria alterado com sucesso! Categoria alterado código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>