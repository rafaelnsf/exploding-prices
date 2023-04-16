<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Cliente</title>
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

        $id           = $_POST['id'];
        $nome         = $_POST['nome'];
        $endereco     = $_POST['endereco'];
        $telefone     = $_POST['telefone'];
        $cpf          = $_POST['cpf'];
        $status       = $_POST['status'];

        $sql = "UPDATE cliente SET nome = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', cpf = '{$cpf}', status = '{$status}' WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo ' Cliente alterado com sucesso! Cliente alterado código: ' . $id;
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>