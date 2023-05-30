<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Categoria</title>
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

        $id     = $_POST['id'];
        $nome     = $_POST['nome'];
        $descricao    = $_POST['descricao'];
        $status      = $_POST['status'];

        $sql = "UPDATE categoria SET nome = '{$nome}', descricao = '{$descricao}', status = '{$status}'WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Categoria alterado com sucesso! Categoria alterado código: ' . $id;
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>