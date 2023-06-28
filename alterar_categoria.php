<?php
include('conexao.php');
include('valida_sessao.php');
include('valida_acesso_usuario.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Categoria</title>
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
        $sql = "SELECT * FROM categoria WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <h1>Alteração de Categoria</h1>
        <form action="alterar_categoria_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Código</label><br>
            <?php echo $id; ?><br><br>

            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?php echo $arr['nome'] ?>" maxlength="100"><br><br>

            <label for="descricao">Descrição</label><br>
            <input type="text" name="descricao" id="descricao" value="<?php echo $arr['descricao'] ?>" maxlength="70"><br><br>

            <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A">Ativo</option>
                <option value="I">Inativo</option>
            </select><br><br>

            <script type="text/javascript" src="./jquery-3.7.0.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    var status = '<?php echo $arr['status']; ?>';
                    var item = $('#status option[value="' + status + '"]');
                    if (item.length > 0) {
                        item.prop('selected', true);
                    } else {
                        alert('item não encontrado');
                    }
                });
            </script>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>
<?php
mysqli_close($con);
?>