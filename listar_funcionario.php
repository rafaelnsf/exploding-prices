<?php
include('conexao.php');
include('valida_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Funcionários</title>
    <link rel="stylesheet" href="style_tables.css">
</head>

<body>
    <div class="conteudo">
        <?php
        include('menu.php');
        ?>
        <h1>Funcionários</h1>
        <a class="btn" href="json_funcionarios_encode.php" target="_blank">JSON</a>
        <a class="btn" href="cadastrar_funcionario.php">Cadastrar</a>
        <?php
        $sql = "SELECT * FROM funcionario";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo 'Erro no banco: ' . mysqli_error($con);
        } else {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
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
                            <td><?php echo $arr['nome']; ?></td>
                            <td><?php echo $arr['cargo']; ?></td>
                            <td><?php echo $arr['salario']; ?></td>
                            <td><?php echo $arr['telefone']; ?></td>
                            <td><?php echo $arr['endereco']; ?></td>
                            <td><?php echo $arr['status']; ?></td>
                            <td>
                                <a href="alterar_funcionario.php?id=<?php
                                                                    echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a href="excluir_funcionario_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
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