<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Fornecedor</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="conteudo">
    <?php
    include('menu.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM funcionario WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Funcionario excluido com sucesso! Funcionario Codigo: '. $id;
    }
    ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>