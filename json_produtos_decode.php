<?php
include('conexao.php');

$json_produto = '[{"nome":"Windows 10 Pro","descricao":"Sistema Operacional","preco":899.99,"estoque":50,"status":"A","id_categoria":1},{"nome":"SSD 500GB","descricao":"Unidade de Armazenamento","preco":299.99,"estoque":20,"status":"A","id_categoria":2},{"nome":"Gabinete Gamer","descricao":"Gabinete para Computador","preco":499.99,"estoque":10,"status":"A","id_categoria":3},{"nome":"Roteador TP-Link","descricao":"Roteador Wi-Fi","preco":149.99,"estoque":30,"status":"A","id_categoria":4},{"nome":"Placa de Vídeo GTX 1660","descricao":"Placa de Vídeo para Games","preco":1599.99,"estoque":5,"status":"A","id_categoria":5},{"nome":"PlayStation 5","descricao":"Console de Videogame","preco":3499.99,"estoque":3,"status":"A","id_categoria":6}]';

$produtos = json_decode($json_produto, true);

foreach ($produtos as $dados) {
    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $preco = $dados['preco'];
    $estoque = $dados['estoque'];
    $status = $dados['status'];
    $id_categoria = $dados['id_categoria'];

    $sql = "INSERT INTO produto (nome, descricao, preco, estoque, status, id_categoria) VALUES ('$nome', '$descricao', $preco, $estoque, '$status', $id_categoria)";
    //echo $sql . "<br>";
    $query = mysqli_query($con, $sql);
}

mysqli_close($con);
?>
<a class="btn" href="listar_produto.php">Voltar para lista</a>