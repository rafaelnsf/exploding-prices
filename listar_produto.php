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
        }

        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <a href="cadastrar_produto.php">Cadastrar</a>
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
</body>

</html>
<?php
mysqli_close($con);
?>