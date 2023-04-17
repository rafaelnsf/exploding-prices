<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Fornecedores</title>
    <link rel="stylesheet" href="style_tables.css">
</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        ?>
        <h1>Fornecedores</h1>
        <a class="btn" href="cadastrar_fornecedor.php">Cadastrar</a>
        <?php
        $sql = "SELECT id, razao_social, cnpj, endereco, telefone, status FROM fornecedor";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Razão Social</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>CNPJ</th>
                        <th>Status</th>

                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $arr['id']; ?></td>
                            <td><?php echo $arr['razao_social']; ?></td>
                            <td><?php echo $arr['endereco']; ?></td>
                            <td><?php echo $arr['telefone']; ?></td>
                            <td><?php echo $arr['cnpj']; ?></td>
                            <td><?php echo $arr['status']; ?></td>
                            <td>
                                <a href="alterar_fornecedor.php?id=<?php
                                                                    echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a href="excluir_fornecedor_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            Total: <?php echo mysqli_num_rows($query); ?> item(s)
        <?php
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>