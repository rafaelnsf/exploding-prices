<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Excluir Categoria</title>
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

        $id = $_GET['id'];

        $sql = "DELETE FROM categoria WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
            echo 'Categoria excluido com sucesso! Categoria Codigo: ' . $id;
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>