<?php
include('conexao.php');

$sql = "SELECT * FROM categoria";
$query = mysqli_query($con, $sql);
while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $dados[] = $arr;
}

echo json_encode($dados);

mysqli_close($con);
