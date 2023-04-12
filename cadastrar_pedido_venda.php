<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Cadastrar Pedido de Venda</title>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <form action="cadastrar_pedido_venda.php" method="post">
        <label for="quantidade">Quantidade de produtos</label><br>
        <input type="number" name="quantidade" id="quantidade"><br><br>

        <button type="submit">Enviar</button>
    </form>
    <br><br>
    <form action="cadastrar_pedido_venda_db.php" method="post">
        <label for="id_cliente">Cliente</label><br>
        <select name="id_cliente" id="id_cliente">
            <?php
            $sql = "SELECT id, nome FROM cliente WHERE status = 'A'";
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

        <label for="id_funcionario">Funcionario</label><br>
        <select name="id_funcionario" id="id_funcionario">
            <?php
            $sql = "SELECT id, nome FROM funcionario WHERE status = 'A'";
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

        <label for="data_pedido_venda">Data do Pedido</label><br>
        <input type="datetime-local" name="data_pedido_venda" id="data_pedido_venda"><br><br>

        <table>
            <thead>
                <tr>
                    <th>Produtos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $quantidade = $_POST['quantidade'];
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

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>
<?php
mysqli_close($con);
?>