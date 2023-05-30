<?php
include('conexao.php');
include('valida_sessao.php');

$sql = "SELECT * FROM funcionario";
$query = mysqli_query($con, $sql);
while ($arr = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $dados[] = $arr;
}

echo json_encode($dados);

mysqli_close($con);
