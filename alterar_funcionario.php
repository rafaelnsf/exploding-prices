<?php
include('conexao.php');
include('valida_sessao.php');
include('valida_acesso_usuario.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Funcionario</title>
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
        $sql = "SELECT * FROM funcionario WHERE id = '{$id}'";
        $query = mysqli_query($con, $sql);
        $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        <h1>Alteração de Funcionario</h1>
        <form action="alterar_funcionario_db.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>Código</label><br>
            <?php echo $id; ?><br><br>

            <label for="nome">Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?php echo
                                                            $arr['nome'] ?>" maxlength="50"><br><br>

            <label for="cargo">Cargo</label><br>
            <input type="text" name="cargo" id="cargo" value="<?php echo
                                                                $arr['cargo'] ?>" maxlength="40"><br><br>

            <label for="salario">Salário</label><br>
            <input type="text" name="salario" id="salario" value="<?php echo
                                                                    $arr['salario'] ?>" maxlength="18,2"><br><br>

            <label for="telefone">Telefone</label><br>
            <input type="text" name="telefone" id="telefone" value="<?php echo $arr['telefone'] ?>" maxlength="11"><br><br>

            <label for="endereco">Endereço</label><br>
            <input type="text" name="endereco" id="endereco" value="<?php echo $arr['endereco'] ?>" maxlength="100"><br><br>

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