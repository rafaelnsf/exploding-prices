<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Usuário</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <h1>Cadastro de Usuários</h1>
        <form action="cadastrar_login_db.php" method="post">

            <label for="login">Nome do Usuário</label><br>
            <input type="text" name="login" id="login" maxlength="50"><br><br>

            <label for="senha">Senha</label><br>
            <input type="password" name="senha" id="senha" maxlength="100"><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>