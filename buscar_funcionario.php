<?php
include('conexao.php');

if (isset($_GET['termo'])) {
    $termo = $_GET['termo'];

    $sql = "SELECT * FROM funcionario WHERE nome LIKE '%$termo%'";
    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $arr['id'] . '</td>';
            echo '<td>' . $arr['nome'] . '</td>';
            echo '<td>' . $arr['cargo'] . '</td>';
            echo '<td>' . $arr['salario'] . '</td>';
            echo '<td>' . $arr['telefone'] . '</td>';
            echo '<td>' . $arr['endereco'] . '</td>';
            echo '<td>' . $arr['status'] . '</td>';
        }
    }
}

mysqli_close($con);
?>