<?php
include('conexao.php');

$login = $_POST['login'];
$senha = md5($_POST['senha']); // Aplica o hash MD5 à senha digitada no login

$sql = "SELECT id FROM usuario WHERE login = '{$login}' AND senha = '{$senha}'";
$query = mysqli_query($con, $sql);
if (!$query) {
    header('Location: index.php?erro=1&msg=' . mysqli_error($con));
} else {
    if (mysqli_num_rows($query) > 0) {
        header('Location: painel.php');
    } else {
        header('Location: index.php?erro=2');
    }
}

mysqli_close($con);
