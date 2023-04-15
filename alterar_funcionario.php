<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Exploding Prices - Alterar Funcionario
    </title>
</head>

<body>
    <?php
    include('menu.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM fornecedor WHERE id = '{$id}'";
    $query = mysqli_query($con, $sql);
    $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>
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
        <input type="text" name="telefone" id="telefone" value="<?php echo$arr['telefone'] ?>" maxlength="11"><br><br>

        <label for="endereco">Endereço</label><br>
        <input type="text" name="endereco" id="endereco" value="<?php echo $arr['endereco'] ?>" maxlength="100"><br><br>   

        <label for="status">Status</label><br>
            <select name="status" id="status">
                <option value="A" <?php if($arr['status'] == 'A') { ?>selected="selected"<?php } ?>>Ativo</option>
                <option value="I" <?php if($arr['status'] == 'I') { ?>selected="selected"<?php } ?>>Inativo</option>
            </select><br><br>


        <button type="submit">Salvar</button>
    </form>
</body>

</html>
<?php
mysqli_close($con);
?>