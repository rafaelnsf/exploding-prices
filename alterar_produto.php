<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Produto</title>
    <style type="text/css" rel="stylesheet">
        .conteudo {
            padding: 20px;
        }
    </style>
</head>


</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        $id = $_GET['id'];
        $sql = "SELECT * FROM produto WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <h1>Alteração de Produtos</h1>
        <form action="alterar_produto_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Código</label><br>
            <?php echo $id; ?><br><br>

            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?php echo $arr['nome'] ?>" maxlength="50"><br><br>

            <label for="descricao">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" value="<?php echo $arr['descricao'] ?>" maxlength="100"><br><br>

            <label for="preco">Preço</label><br>
            <input type="text" name="preco" id="preco" value="<?php echo $arr['preco'] ?>" maxlength="100"><br><br>

            <label for="estoque">Estoque</label><br>
            <input type="text" name="estoque" id="estoque" value="<?php echo $arr['estoque'] ?>" maxlength="5"><br><br>

            <label for="id_categoria">Categoria</label><br>
            <select name="id_categoria" id="id_categoria">
                <?php
                $sql = "SELECT id, nome FROM categoria WHERE status = 'A'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                        <option value="<?php echo $arr2['id']; ?>" <?php if ($arr['id_categoria'] == $arr2['id']) { ?> selected="selected" <?php } ?>><?php echo $arr2['nome']; ?></option>
                <?php
                    }
                }
                ?>
            </select><br><br>

            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A" <?php if ($arr['status'] == 'A') { ?>selected="selected" <?php } ?>>Ativo</option>
                <option value="I" <?php if ($arr['status'] == 'I') { ?>selected="selected" <?php } ?>>Inativo</option>
            </select><br><br>


            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>