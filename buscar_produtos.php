<?php
include('conexao.php');

if (isset($_GET['termo'])) {
    $termo = $_GET['termo'];

    $sql = "SELECT * FROM produto WHERE nome LIKE '%$termo%'";
    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo 'Erro no banco: ' . mysqli_error($con);
    } else {
        while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $arr['id'] . '</td>';
            echo '<td>' . $arr['nome'] . '</td>';
            echo '<td>' . $arr['descricao'] . '</td>';
            echo '<td>' . $arr['preco'] . '</td>';
            echo '<td>' . $arr['estoque'] . '</td>';
            echo '<td>' . $arr['status'] . '</td>';
            echo '<td>' . $arr['id_categoria'] . '</td>';
        }
    }
}

mysqli_close($con);
?>