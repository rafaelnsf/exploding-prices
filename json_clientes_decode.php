<?php
include('conexao.php');

$json_cliente = '[{"nome":"Joãoo","endereco":"Rua Aaa","telefone":"1121111111","cpf":"11113323111","status":"A"},{"nome":"Maria","endereco":"Rua B","telefone":"222233322222","cpf":"22222233222","status":"A"},{"nome":"José","endereco":"Rua C","telefone":"333344333","cpf":"33333334433","status":"I"}]';

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