<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices</title>
    <style type="text/css" rel="stylesheet">
        .erro {
            color: red;
        }

        .conteudo {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <?php
        $erro = @$_GET['erro'];
        $msg  = @$_GET['msg'];
        if ($erro == 1) {
            echo "<p class=\"erro\">Erro no banco: {$msg}</p>";
        } else if ($erro == 2) {
            echo "<p class=\"erro\">Usuário ou senha inválida!</p>";
        }
        ?>
        <form action="login_db.php" method="post">
            <label for="login">Usuário</label><br>
            <input type="text" name="login" id="login" maxlength="40"><br><br>

            <label for="senha">Senha</label><br>
            <input type="password" name="senha" id="senha" maxlength="20"><br><br>

            <button type="submit">Logar</button>
        </form>
        <a href="cadastrar_login.php">
            <button>Registrar</button>
        </a>
    </div>
</body>

</html>