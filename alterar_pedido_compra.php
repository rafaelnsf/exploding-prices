<?php
include('conexao.php');
include('valida_sessao.php');
include('valida_acesso_usuario.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Pedido de Compra</title>
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
        $sql = "SELECT * FROM pedido_compra WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <h1>Alteração de Pedido de Compra</h1>
        <form action="alterar_pedido_compra.php?id=<?php echo $id; ?>" method="post">
            <label for="quantidade">Quantidade</label><br>
            <input type="number" name="quantidade" id="quantidade"><br><br>

            <button type="submit">Cadastrar</button>
        </form>
        <br><br>
        <form action="alterar_pedido_compra_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Código</label><br>
            <?php echo $id; ?><br><br>

            <label for="id_fornecedor">Fornecedor</label><br>
            <select name="id_fornecedor" id="id_fornecedor">
                <?php
                $sql = "SELECT id, razao_social FROM fornecedor WHERE status = 'A'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                        <option value="<?php echo $arr2['id']; ?>" <?php if ($arr['id_fornecedor'] == $arr2['id']) { ?> selected="selected" <?php } ?>><?php echo $arr2['razao_social']; ?></option>
                <?php
                    }
                }
                ?>
            </select><br><br>

            <label for="data_pedido_compra">Data Pedido</label><br>
            <input type="datetime-local" name="data_pedido_compra" id="data_pedido_compra" value="<?php echo $arr['data_pedido_compra']; ?>"><br><br>

            <table>
                <thead>
                    <tr>
                        <th>Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM item_compra WHERE id_pedido_compra = '{$id}'";
                    $query = mysqli_query($con, $sql);
                    while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    ?>
                        <tr>
                            <td>
                                <select name="id_produto[]">
                                    <?php
                                    $sql = "SELECT id, nome FROM produto WHERE status = 'A'";
                                    $query2 = mysqli_query($con, $sql);
                                    if ($query2) {
                                        while ($arr3 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                                    ?>
                                            <option value="<?php echo $arr3['id']; ?>" <?php if ($arr2['id_produto'] == $arr3['id']) { ?> selected="selected" <?php } ?>><?php echo $arr3['nome']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <a href="excluir_item_compra_db.php?id_produto=<?php echo $arr2['id_produto']; ?>&id_pedido_compra=<?php echo $id; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php
                    $quantidade = @$_POST['quantidade'];
                    if ($quantidade > 0) {
                        for ($i = 0; $i < $quantidade; $i++) {
                    ?>
                            <tr>
                                <td>
                                    <select name="id_produto[]">
                                        <?php
                                        $sql = "SELECT id, nome FROM produto WHERE status = 'A'";
                                        $query = mysqli_query($con, $sql);
                                        if ($query) {
                                            while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                                <option value="<?php echo $arr2['id']; ?>"><?php echo $arr2['nome']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table><br><br>

            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A" <?php if ($arr['status'] == 'A') { ?>selected="selected" <?php } ?>>Ativo</option>
                <option value="I" <?php if ($arr['status'] == 'I') { ?>selected="selected" <?php } ?>>Inativo</option>
            </select><br><br>

            <label for="valor_compra">Valor do Pedido</label><br>
            <input type="text" name="valor_compra" id="valor_compra" value="<?php echo $arr['valor_compra']; ?>"><br><br>

            <button type="submit">Alterar</button>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>