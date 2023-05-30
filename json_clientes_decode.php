<?php
include('conexao.php');
include('valida_sessao.php');

$json_cliente = $_POST['json'];
$clientes = json_decode($json_cliente, true);

foreach ($clientes as $dados) {
    $nome = $dados['nome'];
    $endereco = $dados['endereco'];
    $telefone = $dados['telefone'];
    $cpf = $dados['cpf'];
    $status = $dados['status'];

    $sql = "INSERT INTO cliente (nome, endereco, telefone, cpf, status) VALUES ('$nome', '$endereco', '$telefone', '$cpf', '$status')";

    $query = mysqli_query($con, $sql);
}

mysqli_close($con);
?>
<a class="btn" href="listar_cliente.php">Voltar para lista</a>