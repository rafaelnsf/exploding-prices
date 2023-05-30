<?php
include('conexao.php');
include('valida_sessao.php');
include('valida_acesso_usuario.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Pedido de Compra</title>
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
        ?>
        <h1>Cadastro de Pedido de Compra</h1>
        <form action="cadastrar_pedido_compra.php" method="post">
            <label for="quantidade">Quantidade de produtos</label><br>
            <input type="number" name="quantidade" id="quantidade"><br><br>

            <button type="submit">Enviar</button>
        </form>
        <br><br>
        <form action="cadastrar_pedido_compra_db.php" method="post">
            <label for="id_fornecedor">Fornecedor</label><br>
            <select name="id_fornecedor" id="id_fornecedor">
                <?php
                $sql = "SELECT id, razao_social FROM fornecedor WHERE status = 'A'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                ?>
                        <option value="<?php echo $arr['id']; ?>"><?php echo $arr['razao_social']; ?></option>
                <?php
                    }
                }
                ?>
            </select><br><br>

            <label for="data_pedido_compra">Data da compra</label><br>
            <input type="datetime-local" name="data_pedido_compra" id="data_pedido_compra"><br><br>

            <table>
                <thead>
                    <tr>
                        <th>Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $quantidade = @$_POST['quantidade'];
                    if ($quantidade > 0) {
                        for ($i = 0; $i < $quantidade; $i++) {
                    ?>
                            <tr>
                                <td>
                                    <select name="id_produto[]">
                                        <?php
                                        $sql = "SELECT id, nome, preco, estoque FROM produto WHERE status = 'A'";
                                        $query = mysqli_query($con, $sql);
                                        if ($query) {
                                            while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                                <option value="<?php echo $arr['id']; ?>"><?php echo $arr['nome']; ?> | <?php echo $arr['preco']; ?> | <?php echo $arr['estoque']; ?></option>
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

            <label for="valor_compra">Valor</label><br>
            <input type="number" name="valor_compra" id="valor_compra"><br><br>

            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A">Ativo</option>
                <option value="I">Inativo</option>
            </select><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>