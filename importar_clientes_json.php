<?php
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Importar Clientes</title>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <form action="json_clientes_decode.php" method="post">
        <label for="json">JSON</label><br>
        <textarea name="json" id="json"></textarea><br><br>

        <button type="submit">Importar</button>
    </form>
</body>

</html>