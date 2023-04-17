<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Categoria</title>
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
    $id = $_GET['id'];
    $sql = "SELECT * FROM categoria WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>
    <h1>Alteração de Categoria</h1>
    <form action="alterar_categoria_db.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Código</label><br>
        <?php echo $id; ?><br><br>

        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" value="<?php echo $arr['nome'] ?>" maxlength="100"><br><br>

        <label for="descricao">Descrição</label><br>
        <input type="text" name="descricao" id="descricao" value="<?php echo $arr['descricao'] ?>" maxlength="70"><br><br>
           
        <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A" <?php if($arr['status'] == 'A') { ?>selected="selected"<?php } ?>>Ativo</option>
                <option value="I" <?php if($arr['status'] == 'I') { ?>selected="selected"<?php } ?>>Inativo</option>
            </select><br><br>


        <button type="submit">Salvar</button>
    </div>
    </form>
</body>

</html>
<?php
mysqli_close($con);
?>