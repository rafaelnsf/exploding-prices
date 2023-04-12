<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Pedido de Venda</title>
</head>

<body>
    <?php
    include('menu.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM locacao WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>
    <form action="alterar_locacoes.php?id=<?php echo $id; ?>" method="post">
        <label for="quantidade">Quantidade</label><br>
        <input type="number" name="quantidade" id="quantidade"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
    <br><br>
    <form action="alterar_locacoes_db.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Código</label><br>
        <?php echo $id; ?><br><br>

        <label for="id_cliente">Cliente</label><br>
        <select name="id_cliente" id="id_cliente">
            <?php
            $sql = "SELECT id, nome FROM cliente WHERE status = 'A'";
            $query = mysqli_query($con, $sql);
            if ($query) {
                while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            ?>
                    <option value="<?php echo $arr2['id']; ?>" <?php if ($arr['id_cliente'] == $arr2['id']) { ?> selected="selected" <?php } ?>><?php echo $arr2['nome']; ?></option>
            <?php
                }
            }
            ?>
        </select><br><br>

        <label for="data_coleta">Data Coleta</label><br>
        <input type="datetime-local" name="data_coleta" id="data_coleta" value="<?php echo $arr['data_coleta']; ?>"><br><br>

        <label for="data_prevista">Data Prevista</label><br>
        <input type="date" name="data_prevista" id="data_prevista" value="<?php echo $arr['data_prevista']; ?>"><br><br>

        <label for="data_entrega">Data Entrega</label><br>
        <input type="datetime-local" name="data_entrega" id="data_entrega" value="<?php echo $arr['data_entrega']; ?>"><br><br>

        <table>
            <thead>
                <tr>
                    <th>Filme</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM locacao_item WHERE id_locacao = '{$id}'";
                $query = mysqli_query($con, $sql);
                while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                ?>
                    <tr>
                        <td>
                            <select name="id_midia[]">
                                <?php
                                $sql = "SELECT id, titulo FROM midia WHERE status = 'A'";
                                $query2 = mysqli_query($con, $sql);
                                if ($query2) {
                                    while ($arr3 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                                ?>
                                        <option value="<?php echo $arr3['id']; ?>" <?php if ($arr2['id_midia'] == $arr3['id']) { ?> selected="selected" <?php } ?>><?php echo $arr3['titulo']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <a href="excluir_locacao_itens_db.php?id_midia=<?php echo $arr2['id_midia']; ?>&id_locacao=<?php echo $id; ?>">Excluir</a>
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
                                <select name="id_midia[]">
                                    <?php
                                    $sql = "SELECT id, titulo FROM midia WHERE status = 'A'";
                                    $query = mysqli_query($con, $sql);
                                    if ($query) {
                                        while ($arr2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    ?>
                                            <option value="<?php echo $arr2['id']; ?>"><?php echo $arr2['titulo']; ?></option>
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

        <button type="submit">Alterar</button>
    </form>
</body>

</html>
<?php
mysqli_close($con);
?>