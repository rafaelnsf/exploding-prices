<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Funcionario</title>
</head>

<body>
    <?php
    include('menu.php');

    $id         = $_POST['id'];
    $nome       = $_POST['nome'];
    $cargo      = $_POST['cargo'];
    $salario    = $_POST['salario'];
    $telefone   = $_POST['telefone'];
    $endereco   = $_POST['endereco'];
    $status     = $_POST['status'];

    $sql = "UPDATE funcionario SET nome = '{$nome}', nome = '{$nome}', cargo = '{$cargo}', salario = '{$salario}', telefone= '{$telefone}' , endereco = '{$endereco}', status = '{$status}'WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        echo 'Funcionario alterado com sucesso! Funcionario alterado código: ' . $id;
    }
    ?>
</body>

</html>
<?php
mysqli_close($con);
?>