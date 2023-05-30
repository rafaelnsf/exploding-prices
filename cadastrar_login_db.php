<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastro de Usuário</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <?php
        // Processo de cadastro do usuário
        $login = $_POST['login'];
        $senha = md5($_POST['senha']); // Aplica o hash MD5 à senha
        $setor = $_POST['setor'];

        $sql = "INSERT INTO usuario VALUES ('{$login}', '{$senha}', '{$setor}', null)";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro ao consultar o banco.' . mysqli_error($con);
        } else {
            echo 'Realizado cadastro do usuário: ' . mysqli_insert_id($con);
        }
        ?>

        <!-- Botão para voltar ao login -->
        <br>
        <br>
        <br>
        <a href="index.php">
            <button>Voltar ao Login</button>
        </a>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>