<?php
include('conexao.php');
include('valida_sessao.php');

    session_start();

$login = mysqli_real_escape_string($con,$_POST['login']);
$senha = md5 (mysqli_real_escape_string($con,$_POST['senha'])); // Aplica o hash MD5 à senha digitada no login

$sql = "SELECT id FROM usuario WHERE login = '{$login}' AND senha = '{$senha}'";
$query = mysqli_query($con, $sql);
if (!$query) {
    header('Location: index.php?erro=1&msg=' . mysqli_error($con));
} else {
    if (mysqli_num_rows($query) > 0) {
        $arr = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $_SESSION['usuario']=$arr;
        header('Location: painel.php');
    } else {
        header('Location: index.php?erro=2');
    }
}

mysqli_close($con);
?>g
