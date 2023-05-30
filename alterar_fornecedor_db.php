<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Fornecedor</title>
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

        $id           = $_POST['id'];
        $razao_social = $_POST['razao_social'];
        $endereco     = $_POST['endereco'];
        $telefone     = $_POST['telefone'];
        $cnpj         = $_POST['cnpj'];
        $status       = $_POST['status'];

        $sql = "UPDATE fornecedor SET razao_social = '{$razao_social}', endereco = '{$endereco}', telefone = '{$telefone}', cnpj = '{$cnpj}', status = '{$status}' WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Fornecedor alterado com sucesso! Fornecedor alterado código: ' . $id;
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>