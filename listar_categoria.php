<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Categorias</title>
    <style type="text/css" rel="stylesheet">
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
        }

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
        ?>
        <a href="cadastrar_categoria.php">Cadastrar</a>
        <?php
        $sql = "SELECT * FROM categoria";
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
                        <th>Descrição</th>
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
                            <td><?php echo $arr['descricao']; ?></td>
                            <td><?php echo $arr['status']; ?></td>
                            <td>
                                <a href="alterar_categoria.php?id=<?php
                                                                    echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a href="excluir_categoria_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
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