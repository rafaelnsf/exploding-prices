<?php
include('conexao.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Listar Produtos</title>
    <style type="text/css" rel="stylesheet">
        table {
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 100%;
        }

        thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        th,
        td {
            padding: 12px 15px;
            text-transform: uppercase;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        a {
            text-decoration: none;
        }

        .btn {
            background-color: #000;
            color: #fff;
            padding: 15px 25px;
            text-decoration: none;
            float: right;
        }

        .btn:hover {
            background-color: #f8d100;
            color: #000;
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
        <h1>Produtos</h1>
        <a class="btn" href="cadastrar_produto.php">Cadastrar</a>
        <?php
        $sql = "SELECT * FROM produto";
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
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Categoria</th>
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
                            <td><?php echo $arr['preco']; ?></td>
                            <td><?php echo $arr['estoque']; ?></td>
                            <td><?php echo $arr['id_categoria']; ?></td>
                            <td>
                                <a href="alterar_produto.php?id=<?php echo $arr['id']; ?>">Alterar</a>
                            </td>
                            <td>
                                <a href="excluir_produto_db.php?id=<?php echo $arr['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            Total: <?php echo mysqli_num_rows($query); ?> Produto(s)
        <?php
        }
        ?>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>