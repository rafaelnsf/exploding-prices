<?php
include('conexao.php');
include('valida_sessao.php');

$json_categoria = '[{"nome":"Monitores","descricao":"Displays de alta resolução para computadores","status":"A"},
{"nome":"Periféricos","descricao":"Acessórios para computadores e dispositivos","status":"A"},
{"nome":"Impressoras","descricao":"Impressoras para diversos fins","status":"A"}]';

$categorias = json_decode($json_categoria, true);

foreach ($categorias as $dados) {
    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $status = $dados['status'];

    $sql = "INSERT INTO categoria (nome, descricao, status) VALUES ('$nome', '$descricao', '$status')";

    //echo $sql . "<br>";
    $query = mysqli_query($con, $sql);
}

// Fechamento da conexão mysqli
mysqli_close($con);
?>
<a class="btn" href="listar_categoria.php">Voltar para lista</a>