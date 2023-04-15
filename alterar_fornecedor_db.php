<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Fornecedor</title>
</head>

<body>
    <?php
    include('menu.php');

    $id           = $_POST['id'];
    $razao_social = $_POST['razao_social'];
    $endereco     = $_POST['descricao'];
    $telefone     = $_POST['telefone'];
    $cpnj         = $_POST['cpnj'];
    $status       = $_POST['status'];

    $sql = "UPDATE fornecedor SET razao_social = '{$razao_social}', endereco = '{$endereco}', telefone = '{$telefone}', cpnj = '{$cpnj}', status = '{$status}' WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Fornecedor alterado com sucesso! Fornecedor alterado código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>