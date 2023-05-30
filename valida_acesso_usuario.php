<?php
    include('conexao.php');
    $sql = "SELECT * FROM usuario where setor = 'A' and id='{$_SESSION['usuario']['id']}'";

    $query = mysqli_query($con, $sql);
    if (!$query) {

    } else {
        if(mysqli_num_rows($query) == 0) {
            header('Location: ./painel.php');
        }
    }



?>