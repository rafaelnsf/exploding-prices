<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Produto</title>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <form action="cadastrar_produto_db.php" method="post">

        <label for="nome">Nome do Produto</label><br>
        <input type="text" name="nome" id="nome" maxlength="50"><br><br>

        <label for="descricao">Descrição</label><br>
        <input type="text" name="descricao" id="descricao" maxlength="100"><br><br>

        <label for="preco">Preço</label><br>
        <input type="number" name="preco" id="preco"><br><br>

        <label for="estoque">Estoque</label><br>
        <input type="number" name="estoque" id="estoque"><br><br>

        <label for="id_categoria">Categoria</label><br>
        <select name="id_categoria" id="id_categoria">
            <?php
            $sql = "SELECT id, nome FROM categoria WHERE status = 'A'";
            $query = mysqli_query($con, $sql);
            if ($query) {
                while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            ?>
                    <option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?></option>
            <?php
                }
            }
            ?>
        </select><br><br>

        <label for="status">Status</label><br>
        <select name="status" id="status">
            <option value="A">Ativo</option>
            <option value="I">Inativo</option>
        </select><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>
<?php
mysqli_close($con);
?>